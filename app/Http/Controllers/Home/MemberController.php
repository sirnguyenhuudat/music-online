<?php

namespace App\Http\Controllers\Home;

use App\Repositories\User\UserEloquentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    protected $_memberRepository;

    public function __construct(UserEloquentRepository $memberRepository)
    {
        $this->_memberRepository = $memberRepository;
    }

    public function profile ($id)
    {
        $member = $this->_memberRepository->find($id);
        if ($member && Auth::id() == $id){
            $data['title_page'] = trans('home_member.profile');
            $data['member'] = $member;

            return view('home.profile', $data);
        } else {
            return redirect()->route('home');
        }
    }

}
