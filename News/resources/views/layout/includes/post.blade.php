<main>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
                <!-- Hot Aimated News Tittle-->
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
                    <div class="col-lg-30">
                        <!-- Trending Tittle -->

                            <div class="about-right mb-90">
                                <div class="section-tittle mb-30 pt-30">
                                    {!!$posts->content!!}
                                </div>

                                <div class="social-share pt-30">
                                    <div class="section-tittle">
                                        <h3 class="mr-20">Share:</h3>
                                        <ul>
                                            <li><a href="#"><img src="layout/assets/img/news/icon-ins.png" alt=""></a></li>
                                            <li><a href="#"><img src="layout/assets/img/news/icon-fb.png" alt=""></a></li>
                                            <li><a href="#"><img src="layout/assets/img/news/icon-tw.png" alt=""></a></li>
                                            <li><a href="#"><img src="layout/assets/img/news/icon-yo.png" alt=""></a></li>
                                        </ul>
                                    </div>

                                </div>

                            </div>

                        <!-- From -->
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="form-contact contact_form mb-80"  id="contactForm" >
                                 @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
        </div>
    </div>
    <!-- About US End -->
</main>

