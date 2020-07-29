@extends('homepage::layouts.app')

@section('htmlheader_title')
	eLitbang
@endsection

@section('main-content')
<section id="features" class="section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">{{$prosedur->judul_prosedur}}</h2>
        </div>
        <div class="row">
          <!-- Start featured -->
          <div class="col-lg-8 md-8 col-xs-8">
            <div class="featured-box">
              <div class="featured-icon">
                <i class="lni-pencil"></i>
              </div>
              <div class="featured-content">
                <div class="icon-o"><i class="lni-pencil"></i></div>
                <p>{!!$prosedur->narasi!!}</p>
              </div>
              <br><br>              
            </div>

          </div>
          <div class="col-lg-4 col-md-4 col-xs-4">
            <div class="featured-box">
              <div class="featured-content">
                <image height="250" width="200" src="{{asset('img/icon/pdf.png')}}">
              </div>
              <br><br>              
            </div>

          </div>
          Download File &nbsp;<a href="{{url('prosedur/download/'.$prosedur->id)}}" target="_blank">{{$prosedur->judul_prosedur}}</a>
          
        </div>
      </div>
    </section>
@endsection