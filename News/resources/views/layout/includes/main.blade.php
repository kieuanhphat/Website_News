<main>
        <!-- Trending Area Start -->
        <div class="trending-area fix">
            <div class="container">
                <div class="trending-main">
                    <!-- Trending Tittle -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="trending-tittle">
                                <strong>Trending now</strong>
                                <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                                <div class="trending-animated">
                                    <ul id="js-news" class="js-hidden">
                                        <li class="news-item">Bangladesh dolor sit amet, consectetur adipisicing elit.</li>
                                        <li class="news-item">Spondon IT sit amet, consectetur.......</li>
                                        <li class="news-item">Rem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <!-- Trending Top -->
                            <div class="trending-top mb-30">
                                <div class="trend-top-img">
                                    <img height="500px"src="{{asset('public/img/'.$posttrend -> image)}}" alt="">
                                    <div class="trend-top-cap">
                                       <span class="color1" >{{$posttrend->category->name}}</span>
                                        <h2><a href="{{$posttrend->slug}}.html">{{$posttrend->name}}</a></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- Trending Bottom -->
                            <div class="trending-bottom">
                                <div class="row">
                                    @foreach($posts as $post)
                                        <div class="col-lg-4">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img height="200px"src="{{asset('public/img/'.$post -> image)}}" alt="">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <span class="color3">{{$post->category->name}}</span>
                                                    <h4 font-weight="30px"><a href="{{$post->slug}}.html">{{$post->name}}</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Riht content -->
                        <div class="col-lg-4">
                            @foreach($posts_hot as $hot)
                                <div class="trand-right-single d-flex">
                                    <div class="trand-right-img">
                                        <img width="150px"height="100px" src="{{asset('public/img/'.$hot -> image)}}" alt="">
                                    </div>
                                    <div class="trand-right-cap">
                                        <span class="color1" >{{$hot->category->name}}</span>
                                        <h4><a href="{{$hot->slug}}.html">{{$hot->name}}</a></h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Trending Area End -->
    </main>
