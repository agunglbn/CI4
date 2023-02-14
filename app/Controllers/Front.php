<?php

namespace App\Controllers;

class Front extends BaseController
{
    public function index()
    {
        $data = ([
            'berita' =>  $this->berita->where('status', '1')->orderBy('created', 'desc')->limit(5) //ASC dan DESC   
                ->find(),
            'gallery' =>  $this->gallery->where('status', '1')->orderBy('created', 'desc')->limit(12) //ASC dan DESC   
                ->findAll(),
        ]);
        return view('front/content', $data);
    }

    function GetGallery()
    {
        $data = ([
            'gallery' =>  $this->gallery->where('status', '1')->orderBy('created', 'desc')->limit(12) //ASC dan DESC   
                ->findAll(),
        ]);
    }
}