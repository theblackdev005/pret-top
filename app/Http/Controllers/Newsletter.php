<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Newsletter extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.newsletter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error['danger'] = 176;
        if($this->validator->is()){
            $post = $this->validator->get();
            extract($post);
            file_put_contents(ROOT . "newsletter.txt", $email . "\n", FILE_APPEND);
            $res = true;
            if ($res) {
                $error['success'] = 177;
            }
            $this->session->set(compact('error'));
        }
        if (!isset($target)) {
            $target = 'index';
        }
        $this->location($target);
    }
}
