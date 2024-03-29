<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FunnyQuote;

class FunnyQuoteController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FunnyQuote $f)
    {
        $quote = ($f->getFunnyQuote());

        $author = $quote->author;
        $body = $quote->body;

        return view(
            'quote.getQuote',
            [
                'author' => $author, 'body' => $body,
                'author2' => 'A lie gets halfway around the world before the truth has a chance to get its pants on.', 'body2' => "Winston Churchill"
            ]
        );
    }
}
