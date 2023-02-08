<?php

namespace App\Controllers;

class Front extends BaseController
{
    public function index()
    {
        $data = ([
            'berita' =>  $this->berita->where('status', '1')->orderBy('created', 'desc')->limit(5) //ASC dan DESC   
                ->find(),
        ]);
        return view('front/content', $data);
    }

    function frontBerita()
    {
        // $data = ([
        //     'berita' =>  $this->berita->where('status', '1')->orderBy('created', 'asc') //ASC dan DESC   
        //         ->findAll(),
        // ]);
    }
}
