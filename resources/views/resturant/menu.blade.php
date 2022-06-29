@extends('layouts.frontend')
@section('content')
        <div class="container px-12">
        <!-- Blog Section Begin -->

            <section class="from-blog spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title from-blog__title">
                                <h1>MENU</h1>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                    @foreach($Menus as $menu)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src={{ asset('images/'.$menu->image_path) }} alt="">
                                </div>
                                <div class="blog__item__text">
                                    <p>{{$menu->name}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </section>      
        </div>
@endsection
