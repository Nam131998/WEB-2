<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\slide;
use App\phim;
use App\User;
use App\lichchieu;
use App\combo;
use App\datve;
use App\cmtphim;
use App\ghe;
use App\datghe;
use App\ve;
use App\phong;
use App\rap;
use App\datcombo;
use App\tintuc;
use Illuminate\Support\collection;
 
class HomeController extends Controller
{
    public function trangchu()
    {   
        $slide=slide::limit(4)->get();
        $phimdc=phim::where('trangthai','1')->limit(8)->get();
        $phimsc=phim::where('trangthai','0')->limit(8)->get();
        $review=tintuc::where('theloai',1)->get();
        $blog=tintuc::where('theloai',0)->get();
        return view('trangchu',compact('slide','phimdc','phimsc','review','blog'));
    }
    public function chitietphim($idphim)
    {
        $title=phim::select('tenphim')->where('id',$idphim)->get();
        foreach ($title as $td) {
            $tieude=$td->tenphim;
        }
        $phim=phim::where('id',$idphim)->get();
        $phimlq=phim::where('trangthai','1')
        ->inRandomOrder()->limit(4)->get();

        $cmtphim=cmtphim::where('id_phim',$idphim)->get();

        $lich=lichchieu::where('id_phim',$idphim)->groupby('id_rap')->distinct()->get();
        
        for($i=0;$i<count($lich);$i++){
            $n=lichchieu::where([['id_phim',$idphim],['id_rap',$lich[$i]->id_rap]])->groupby('ngay')->distinct()->get();
                for ($k=0; $k <count($n) ; $k++) { 
                    $p=lichchieu::where([['id_phim',$idphim],['id_rap',$lich[$i]->id_rap],['ngay',$n[$k]->ngay]])->groupby('id_phong')->distinct()->get();
                    for($j=0;$j<count($p);$j++){
                        $t=lichchieu::where([['id_phim',$idphim],['id_rap',$lich[$i]->id_rap],['ngay',$n[$k]->ngay],['id_phong',$p[$j]->id_phong]])->get();
                        $p[$j]['time']=$t;
                }
                $n[$k]['id_phong']=$p;
                }
                
                $lich[$i]['ngay']=$n;
        }
        // dd($lich);
         return view('phim',compact('tieude','phim','phimlq','lich','cmtphim'));
    }

    public function chitietdatve($id)
    {
        $lichchieu=lichchieu::where('id',$id)->get();
        $cb=combo::all();
        foreach ($lichchieu as $lc) {
            $idp=$lc->id_phong;
        }
        // $datghe=datghe::where('id_lichchieu',$id)->get();
        $ghe=ghe::where('id_phong',$idp)->groupby('row')->distinct()->get();
        for($i=0;$i<count($ghe);$i++){
            $g=ghe::where([['id_phong',1],['row',$ghe[$i]->row]])->get();

            $ghe[$i]['number']=$g;
        }
        
        $ve=ve::where('id_lichchieu',$id)->get();
        return view('datve',compact('lichchieu','cb','ghe','ve'));
    }
    public function chitietdatve2(Request $req)
    {
        $lichchieu=lichchieu::where('id',$req->thoigian)->get();
        $cb=combo::all();
        foreach ($lichchieu as $lc) {
            $idp=$lc->id_phong;
        }
        // $datghe=datghe::where('id_lichchieu',$id)->get();
        $ghe=ghe::where('id_phong',$idp)->groupby('row')->distinct()->get();
        for($i=0;$i<count($ghe);$i++){
            $g=ghe::where([['id_phong',1],['row',$ghe[$i]->row]])->get();

            $ghe[$i]['number']=$g;
        }
        
        $ve=ve::where('id_lichchieu',$req->thoigian)->get();
        return view('datve',compact('lichchieu','cb','ghe','ve'));
    }


    public function review($id)
    {
        $phimlq=phim::where('trangthai','0')
        ->inRandomOrder()->limit(4)->get();
        $review=tintuc::where([['id',$id],['theloai',1]])->get();
        return view('Review',compact('review','phimlq'));
    }

    public function blog($id)
    {
        $phimlq=phim::where('trangthai','0')
        ->inRandomOrder()->limit(4)->get();
        $blog=tintuc::where([['id',$id],['theloai',0]])->get();
        return view('blog',compact('blog','phimlq'));
    }
    
    public function rap()
    {
        $rap=rap::where([['id',$id],['tenrap',0]])->get();
        return view('rap',compact('rap'));
    }
    
    public function phimdangchieu()
    {
        $phimdc=phim::where('trangthai','1')->paginate(8);
        return view('phimdangchieu',compact('phimdc'));
    }
    public function phimsapchieu()
    {
        $phimsc=phim::where('trangthai','0')->paginate(8);
        return view('phimsapchieu',compact('phimsc'));
    }
    public function formdangnhap()
    {
        return view('.login.dangnhap');
    }
    public function getdangky()
    {
        return view('.login.dangky');
    }
     
    public function postdangky(Request $request)
    {
        $this->validate($request,[
            'pass'=>'required|min:3',
            'repass'=>'required|min:3|same:pass'
        ],[
            'repass.same'=>'Bạn chưa nhập lại mật khẩu'
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->pass);
        $user->save();
        return redirect('/');

    }
    public function dangxuat()
    {
        Auth::logout();
        return redirect('/');
    }
   

    public function datve(Request $req)
    {
        $ghe=$req->allseat;
        for ($i=0; $i < count($ghe) ; $i++) { 
            $ve=ve::where([['id_lichchieu',$req->idlich],['id_ghe',$ghe[$i]]])->update([
                'id_user'=>$req->iduser
            ]);
        }
        $combo=$req->allcombo;
        for ($i=0; $i <count($combo) ; $i++) { 
            $cb = new datcombo;
            $cb->id_lichchieu=$req->idlich;
            $cb->id_user=$req->iduser;
            $cb->id_combo=$combo[$i]['idcb'];
            $cb->soluong=$combo[$i]['slcb'];
            $cb->save();
        }
        
    }
    public function postcmt(Request $request,$id)
    {
        $cmt=new cmtphim;
        $cmt->id_phim=$id;
        $cmt->id_user=Auth::user()->id;
        $cmt->noidung=$request->noidungcmt;
        $cmt->save();

        return redirect()->back();
    }
    public function postTimkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $tukhoangay = date("Y-m-d",strtotime($request->tukhoa));
        $phimdc = phim::where('tenphim','like',"%$tukhoa%")->orWhere('tentienganh','like',"%$tukhoa%")->orWhere('ngaykhoichieu','like',"%$tukhoangay%")->orWhere('theloai','like',"%$tukhoa%")->get();
        return view('timkiem',['phimdc' => $phimdc,'tukhoa' => $tukhoa]);
    }
    public function postAjaxrap($id)
    {
         $lich=lichchieu::where('id_phim',$id)->groupby('id_rap')->distinct()->get();
           
            foreach ($lich as $l) {

                 echo "<option value='".$l->id_rap."' id='".$l->id_phim."'>".$l->rap->tenrap."</option>";
                
            }
        // console.log($lichchieu);
       // dd($lichchieu);
    }
    public function postAjaxngay($id,$idphim)
    {
        $lich=lichchieu::where('id_phim',$idphim)->groupby('id_rap')->distinct()->get();
        $ngay=lichchieu::where([['id_phim',$idphim],['id_rap',$id]])->groupby('ngay')->distinct()->get();
                foreach ($ngay as $n) 
                {
                    echo "<option value='".$n->ngay."'>".$n->ngay."</option>";
                }
                
    }
    public function postAjaxgio($id,$idphim)
    { 
        $lich=lichchieu::where('id_phim',$idphim)->groupby('id_rap')->distinct()->get();
        $time=lichchieu::where([['id_phim',$idphim],['id_rap',$id]])->groupby('time')->distinct()->get();
                foreach ($time as $t) 
                {
                    echo "<option value='".$t->id."'>".$t->time. " | 2D Phụ đề</option>";
                }
                
    }
    
    public function ajaxrap(Request $req)
    {
        $lich=lichchieu::where('ngay',$req->ngay)->groupby('id_phim')->distinct()->get();
        for ($i=0; $i <count($lich); $i++) { 
            $h=lichchieu::where([['ngay',$req->ngay],['id_phim',$lich[$i]->id_phim]])->groupby('time')->distinct()->get();
            $lich[$i]['id_rap']=$h;
        }
        foreach ($lich as $l) {
            echo "<div class='row mt-2 pt-4'>";
            echo "<div class='col-md-3'>";
            echo "<a href='http://localhost/da/phim/".$l->phim->id."'><img style='width: 130px;height: auto;float: left;margin-right: 30px;'
             src='public/anhda4/phim/".$l->phim->image."' alt=''/></a>";
             echo "</div>";
             echo "<div class='col-md-9'>";
            echo "<h4 class='ng-binding'>".$l->phim->tenphim."</h4>";
            echo "<div class='ticket-showtime-icon'>";
            echo "<span class='ng-binding mr-5'>";
            echo "<i class='fa fa-calendar-alt'>
            </i>&nbsp;&nbsp;Ngày khởi chiếu: ".date('d-m-Y', strtotime($l->phim->ngaykhoichieu))."</span>";
            echo "<span class='ng-binding'>";
            echo "<i class='fas fa-clock'></i>&nbsp;Thời lượng: ".$l->phim->thoiluong."&nbsp;Phút</span>";
            echo "<div class='gio mt-3'>";
            echo "<ul>";
            foreach ($l->id_rap as $tg) 
            {
                echo "<a href='datve/".$l->id."' name='datve' id='datve'><li>".date("G:i",strtotime($tg->time))."</li></a>";
            }
            echo "</ul>";
            echo "</div>
                </div></div></div>";
            // echo "<h4 class='ng-binding'>".$l->phim->tenphim."</h4>
            //     <div class='ticket-showtime-icon'>
            //         <span class='ng-binding mr-5'>
            //         <i class='fa fa-calendar-alt'></i>&nbsp;&nbsp;2019
            //         </span>
            //         <span class='ng-binding'>
            //         <i class=fas fa-clock'></i>&nbsp;
            //         ".$l->phim->thoiluong."
            //         </span>
            //         <div class=gio mt-3'>
            //             <ul>"
            //             foreach ($l->id_rap as $t) {
            //                 echo "<a href='#'><li>".$t->time."</li></a>";
            //             }
            //             "</ul>
            //         </div>
            //     </div>";
        }
    }
}
