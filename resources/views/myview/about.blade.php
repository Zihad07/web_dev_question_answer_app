@extends('layouts.cardlayout')
@section('card-header','About')

@section('content')
<p>
    <strong>WebDev-Ask&Answer</strong> is a Question and Answer web-base simple application.
</p>

<p>
    By this application you can ask about Web-development and Programming related questions.
    You can also answer other question, like or unlike.
</p>

<hr class="my-2">

<h3 class="text-center">Tools</h3>
    <div class="card card-body">
        <table class="table table-striped table-inverse">

            <tr>
                <th>Framwork</th>
                <td>Laravel</td>
            </tr>

            <tr>
                <th>
                    Database
                </th>
                <td>
                    MySql
                </td>
            </tr>

            <tr>
                <th>Css Framwork</th>
                <td>Bootstrap4</td>
            </tr>
            <tr>
                <th>Like & Unlike Component</th>
                <td>VueJS</td>
            </tr>

            <tr>
                <th colspan="2" class="text-center">
                    <a class="btn btn-primary btn-sm" href="https://github.com/Zihad07" target="_blank">
                        About Me
                    </a>
                </th>
            </tr>


        </table>
    </div>

@endsection
