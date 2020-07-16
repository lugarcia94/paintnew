<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/dist/app.min.css" />
	<script defer type="text/javascript" src="<?php bloginfo('template_url'); ?>/dist/app.min.js"></script>
</head>
<body>

    <!-- SVG Sprite -->
    <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>

            <symbol id="icon-search" viewBox="0 0 24 24">
                <path d="M23.998 22.282l-6.551-6.552c1.522-1.958 2.24-4.423 2.009-6.892s-1.395-4.757-3.255-6.399c-1.859-1.641-4.274-2.512-6.753-2.435s-4.835 1.096-6.589 2.849-2.774 4.109-2.852 6.588c-0.078 2.479 0.792 4.894 2.432 6.754s3.928 3.025 6.397 3.258c2.469 0.233 4.934-0.484 6.893-2.005l6.552 6.552 1.718-1.718zM9.774 17.066c-1.687 0.001-3.322-0.583-4.626-1.652s-2.198-2.558-2.528-4.212c-0.33-1.654-0.076-3.372 0.718-4.86s2.080-2.654 3.638-3.301c1.558-0.646 3.292-0.732 4.906-0.243s3.009 1.522 3.947 2.924c0.938 1.402 1.36 3.086 1.196 4.765s-0.906 3.248-2.098 4.442c-0.675 0.679-1.478 1.218-2.362 1.585s-1.833 0.555-2.791 0.553h-0.001z"></path>
            </symbol>

            <symbol id="icon-cart" viewBox="0 0 24 24">
                <path d="M4.8 0c0.284 0.011 0.556 0.121 0.769 0.309s0.355 0.444 0.401 0.725l1.169 5.634h15.661c0.187 0.003 0.371 0.051 0.536 0.14s0.305 0.217 0.41 0.373c0.114 0.165 0.192 0.352 0.23 0.549s0.034 0.4-0.011 0.595l-2.4 10.666c-0.050 0.275-0.193 0.525-0.405 0.709s-0.479 0.289-0.759 0.299h-12c-0.284-0.011-0.556-0.12-0.769-0.308s-0.355-0.445-0.401-0.725l-3.384-16.301h-3.845v-2.665h4.8zM9.353 17.334h10.108l1.8-8h-13.569l1.661 8z"></path>
                <path d="M20.799 24c0.884 0 1.6-0.716 1.6-1.6s-0.716-1.6-1.6-1.6c-0.884 0-1.6 0.716-1.6 1.6s0.716 1.6 1.6 1.6z"></path>
                <path d="M9.4 24c0.884 0 1.6-0.716 1.6-1.6s-0.716-1.6-1.6-1.6c-0.884 0-1.6 0.716-1.6 1.6s0.716 1.6 1.6 1.6z"></path>
            </symbol>

            <symbol id="icon-menu" viewBox="0 0 24 24">
                <path d="M24 3.636h-24v2.182h24v-2.182z"></path>
                <path d="M24 10.909h-24v2.182h24v-2.182z"></path>
                <path d="M24 18.182h-24v2.182h24v-2.182z"></path>
            </symbol>

            <symbol id="icon-star" viewBox="0 0 24 24">
                <path d="M12.897 1.557c-0.092-0.189-0.248-0.352-0.454-0.454-0.495-0.244-1.095-0.041-1.339 0.454l-2.858 5.789-6.391 0.935c-0.208 0.029-0.411 0.127-0.571 0.291-0.386 0.396-0.377 1.029 0.018 1.414l4.623 4.503-1.091 6.362c-0.036 0.207-0.006 0.431 0.101 0.634 0.257 0.489 0.862 0.677 1.351 0.42l5.714-3.005 5.715 3.005c0.186 0.099 0.408 0.139 0.634 0.101 0.544-0.093 0.91-0.61 0.817-1.155l-1.091-6.362 4.623-4.503c0.151-0.146 0.259-0.344 0.292-0.572 0.080-0.546-0.298-1.054-0.845-1.134l-6.39-0.934zM12 4.259l2.193 4.444c0.151 0.305 0.436 0.499 0.752 0.547l4.906 0.717-3.549 3.457c-0.244 0.238-0.341 0.569-0.288 0.885l0.837 4.883-4.386-2.307c-0.301-0.158-0.647-0.148-0.931 0l-4.386 2.307 0.837-4.883c0.058-0.336-0.059-0.661-0.288-0.885l-3.549-3.457 4.907-0.718c0.336-0.049 0.609-0.26 0.752-0.546z"></path>
            </symbol>
            
            <symbol id="icon-close" viewBox="0 0 20 20">
                <path d="M10 8.586l-7.071-7.071-1.414 1.414 7.071 7.071-7.071 7.071 1.414 1.414 7.071-7.071 7.071 7.071 1.414-1.414-7.071-7.071 7.071-7.071-1.414-1.414-7.071 7.071z"></path>
            </symbol>

            <symbol id="icon-giftlist" viewBox="0 0 24 24">
                <path d="M12.833 3.305c2.671-2.499 6.885-2.352 9.384 0.343 2.377 2.548 2.377 6.493 0 9.041l-9.433 9.458c-0.441 0.441-1.127 0.441-1.568 0l-9.433-9.458c-2.499-2.671-2.352-6.86 0.319-9.384 2.548-2.377 6.493-2.377 9.041 0l0.833 0.833c0.025 0 0.858-0.833 0.858-0.833zM20.674 11.146c1.74-1.74 1.74-4.533 0-6.272s-4.533-1.74-6.272 0l-1.617 1.617c-0.441 0.441-1.127 0.441-1.568 0l-1.617-1.617c-1.74-1.74-4.533-1.74-6.272 0s-1.74 4.533 0 6.272l8.673 8.649 8.673-8.649z"></path>
            </symbol>

            <symbol id="icon-mail" viewBox="0 0 24 24">
                <path d="M23.060 13.664c0.249 0 0.487-0.099 0.663-0.275s0.275-0.414 0.275-0.663v-6.141c-0.001-0.994-0.396-1.947-1.099-2.65s-1.655-1.099-2.649-1.1h-16.5c-0.994 0.001-1.947 0.397-2.65 1.1s-1.098 1.656-1.1 2.65v10.828c0.001 0.994 0.397 1.947 1.1 2.65s1.656 1.098 2.65 1.1h16.5c0.994-0.001 1.947-0.397 2.65-1.1s1.098-1.656 1.1-2.65c0-0.249-0.099-0.487-0.275-0.663s-0.414-0.275-0.663-0.275c-0.249 0-0.487 0.099-0.663 0.275s-0.275 0.414-0.275 0.663c-0.001 0.497-0.198 0.974-0.55 1.325s-0.828 0.549-1.325 0.55h-16.5c-0.497-0.001-0.974-0.198-1.325-0.55s-0.549-0.828-0.55-1.325v-10.63l8.144 5.065c0.593 0.372 1.28 0.57 1.98 0.57s1.387-0.197 1.98-0.57l8.144-5.065v5.943c0 0.248 0.099 0.487 0.274 0.663s0.414 0.275 0.662 0.275zM12.988 10.257c-0.297 0.186-0.64 0.285-0.99 0.285s-0.693-0.099-0.99-0.285l-8.35-5.192c0.318-0.229 0.7-0.353 1.093-0.352h16.5c0.392-0 0.774 0.123 1.093 0.352l-8.355 5.192z"></path>
            </symbol>

            <symbol id="icon-mail-2" viewBox="0 0 24 24">
                <path d="M23.683 4.053c-0.192-0.263-0.459-0.462-0.765-0.572s-0.638-0.127-0.954-0.047l-20.727 5.219c-0.314 0.079-0.597 0.249-0.814 0.489s-0.358 0.539-0.406 0.859c-0.047 0.32 0.001 0.647 0.139 0.939s0.36 0.537 0.638 0.704l4.384 2.631v5.77c-0 0.107 0.030 0.212 0.086 0.303s0.138 0.164 0.234 0.211c0.096 0.047 0.204 0.066 0.31 0.055s0.208-0.052 0.292-0.118l4.111-3.196 3.374 2.023c0.369 0.222 0.812 0.289 1.23 0.187s0.78-0.365 1.006-0.733l7.933-12.898c0.171-0.277 0.255-0.599 0.242-0.924s-0.123-0.639-0.315-0.902zM14.331 17.509l-5.141-3.084 5.215-4.493c0.022-0.013 0.041-0.031 0.057-0.051s0.026-0.044 0.033-0.069c0.006-0.025 0.008-0.051 0.004-0.076s-0.012-0.050-0.026-0.072-0.031-0.041-0.051-0.057c-0.021-0.015-0.044-0.026-0.069-0.033s-0.051-0.008-0.076-0.004-0.050 0.012-0.072 0.026l-7.942 3.070-3.859-2.314 19.322-4.864-7.394 12.020z"></path>
            </symbol>

            <symbol id="icon-whatsapp" viewBox="0 0 32 32">
                <path d="M27.281 4.65c-2.994-3-6.975-4.65-11.219-4.65-8.738 0-15.85 7.112-15.85 15.856 0 2.794 0.731 5.525 2.119 7.925l-2.25 8.219 8.406-2.206c2.319 1.262 4.925 1.931 7.575 1.931h0.006c0 0 0 0 0 0 8.738 0 15.856-7.113 15.856-15.856 0-4.238-1.65-8.219-4.644-11.219zM16.069 29.050v0c-2.369 0-4.688-0.637-6.713-1.837l-0.481-0.288-4.987 1.306 1.331-4.863-0.313-0.5c-1.325-2.094-2.019-4.519-2.019-7.012 0-7.269 5.912-13.181 13.188-13.181 3.519 0 6.831 1.375 9.319 3.862 2.488 2.494 3.856 5.8 3.856 9.325-0.006 7.275-5.919 13.188-13.181 13.188zM23.294 19.175c-0.394-0.2-2.344-1.156-2.706-1.288s-0.625-0.2-0.894 0.2c-0.262 0.394-1.025 1.288-1.256 1.556-0.231 0.262-0.462 0.3-0.856 0.1s-1.675-0.619-3.188-1.969c-1.175-1.050-1.975-2.35-2.206-2.744s-0.025-0.613 0.175-0.806c0.181-0.175 0.394-0.463 0.594-0.694s0.262-0.394 0.394-0.662c0.131-0.262 0.069-0.494-0.031-0.694s-0.894-2.15-1.219-2.944c-0.319-0.775-0.65-0.669-0.894-0.681-0.231-0.012-0.494-0.012-0.756-0.012s-0.694 0.1-1.056 0.494c-0.363 0.394-1.387 1.356-1.387 3.306s1.419 3.831 1.619 4.1c0.2 0.262 2.794 4.269 6.769 5.981 0.944 0.406 1.681 0.65 2.256 0.837 0.95 0.3 1.813 0.256 2.494 0.156 0.762-0.113 2.344-0.956 2.675-1.881s0.331-1.719 0.231-1.881c-0.094-0.175-0.356-0.275-0.756-0.475z"></path>
            </symbol>

            <symbol id="icon-youtube" viewBox="0 0 32 32">
                <path d="M31.681 9.6c0 0-0.313-2.206-1.275-3.175-1.219-1.275-2.581-1.281-3.206-1.356-4.475-0.325-11.194-0.325-11.194-0.325h-0.012c0 0-6.719 0-11.194 0.325-0.625 0.075-1.987 0.081-3.206 1.356-0.963 0.969-1.269 3.175-1.269 3.175s-0.319 2.588-0.319 5.181v2.425c0 2.587 0.319 5.181 0.319 5.181s0.313 2.206 1.269 3.175c1.219 1.275 2.819 1.231 3.531 1.369 2.563 0.244 10.881 0.319 10.881 0.319s6.725-0.012 11.2-0.331c0.625-0.075 1.988-0.081 3.206-1.356 0.962-0.969 1.275-3.175 1.275-3.175s0.319-2.587 0.319-5.181v-2.425c-0.006-2.588-0.325-5.181-0.325-5.181zM12.694 20.15v-8.994l8.644 4.513-8.644 4.481z"></path>
            </symbol>

            <symbol id="icon-social-facebook" viewBox="0 0 24 24">
                <path d="M14.25 9h4.5v4.5h-4.5v10.5h-4.5v-10.5h-4.5v-4.5h4.5v-1.883c0-1.784 0.561-4.036 1.677-5.268 1.116-1.234 2.509-1.85 4.179-1.85h3.144v4.5h-3.15c-0.747 0-1.35 0.603-1.35 1.348v3.152z"></path>
            </symbol>

            <symbol id="icon-instagram" viewBox="0 0 24 24">
                <path d="M6.545 0c-1.808 0-3.445 0.734-4.629 1.917s-1.917 2.821-1.917 4.629v10.909c0 1.808 0.734 3.445 1.917 4.629s2.821 1.917 4.629 1.917h10.909c1.808 0 3.445-0.734 4.629-1.917s1.917-2.821 1.917-4.629v-10.909c0-1.808-0.734-3.445-1.917-4.629s-2.821-1.917-4.629-1.917zM6.545 2.182h10.909c1.205 0 2.294 0.488 3.085 1.279s1.279 1.88 1.279 3.085v10.909c0 1.205-0.488 2.294-1.279 3.085s-1.88 1.279-3.085 1.279h-10.909c-1.205 0-2.294-0.488-3.085-1.279s-1.279-1.88-1.279-3.085v-10.909c0-1.205 0.488-2.294 1.279-3.085s1.88-1.279 3.085-1.279zM17.443 11.152c-0.164-1.060-0.623-2.026-1.303-2.8-0.823-0.939-1.968-1.598-3.283-1.793-0.506-0.081-1.058-0.084-1.611-0.002-1.49 0.22-2.75 1.027-3.58 2.146s-1.236 2.56-1.015 4.049 1.027 2.75 2.146 3.58 2.56 1.236 4.049 1.015 2.75-1.027 3.58-2.146 1.236-2.56 1.015-4.049zM15.285 11.473c0.133 0.895-0.109 1.755-0.609 2.429s-1.255 1.155-2.148 1.287-1.755-0.109-2.429-0.609-1.155-1.255-1.287-2.148 0.109-1.755 0.609-2.429 1.255-1.155 2.148-1.287c0.341-0.050 0.671-0.046 0.949-0.002 0.807 0.12 1.49 0.513 1.983 1.076 0.409 0.467 0.687 1.051 0.785 1.683zM19.091 6c0-0.602-0.489-1.091-1.091-1.091s-1.091 0.489-1.091 1.091 0.489 1.091 1.091 1.091 1.091-0.489 1.091-1.091z"></path>
            </symbol>

        </defs>
    </svg>


  

    



    <!-- Main -->

    <main class="main">


        <!-- Banner Full -->
        <section class="banner--full">

            <div class="uk-container uk-container-small">

                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>

                    <ul class="uk-slideshow-items">
                        <li>
                            <a href=""><img data-src="https://picsum.photos/1023/600?random=1" width="1023" height="600" alt="" uk-cover uk-img="target: !.uk-slideshow-items"></a>
                        </li>
                        <li>
                            <a href=""><img data-src="https://picsum.photos/1023/600?random=2" width="1023" height="600" alt="" uk-cover uk-img="target: !.uk-slideshow-items"></a>
                        </li>
                        <li>
                            <a href=""><img data-src="https://picsum.photos/1023/600?random=3" width="1023" height="600" alt="" uk-cover uk-img="target: !.uk-slideshow-items"></a>
                        </li>
                    </ul>
                
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" uk-slidenav-next uk-slideshow-item="next"></a>
                
                </div>

            </div>

        </section>


        <!-- Search -->
        <section class="search--section">

            <div class="uk-container uk-container-small">

                <!-- Variable Woordpress -->
                <form role="search" method="get" action="" class="search__form">
                    <input type="hidden" name="post_type" value="product"> 
                    <input class="header-search-input" name="s" type="text" placeholder="Search products..."> 
                    <button class="header-search-button" type="submit"><svg class="icon icon-search"><use xlink:href="#icon-search"></use></svg></button>
                </form>

            </div>


        </section>


        <!-- Categorys -->
        <section class="categorys uk-section uk-section-small">

            <div class="uk-container uk-container-small">

                <h2 class="categorys__title">Compre por categoria</h2>

                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true">

                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-grid">
                        <li>
                            <figure class="categorys__figure">
                                <a href="" class="categorys__link">
                                    <img data-src="https://picsum.photos/120/120?random=1" width="120" height="120" alt="" uk-img="target: !.uk-slideshow-items" class="categorys__image uk-border-circle">
                                    <figcaption class="categorys__caption">Nome da Categoria</figcaption>
                                </a>
                            </figure>
                        </li>
                        <li>
                            <figure class="categorys__figure">
                                <a href="" class="categorys__link">
                                    <img data-src="https://picsum.photos/120/120?random=2" width="120" height="120" alt="" uk-img="target: !.uk-slideshow-items" class="categorys__image uk-border-circle">
                                    <figcaption class="categorys__caption">Nome da Categoria</figcaption>
                                </a>
                            </figure>
                        </li>
                        <li>
                            <figure class="categorys__figure">
                                <a href="" class="categorys__link">
                                    <img data-src="https://picsum.photos/120/120?random=3" width="120" height="120" alt="" uk-img="target: !.uk-slideshow-items" class="categorys__image uk-border-circle">
                                    <figcaption class="categorys__caption">Nome da Categoria</figcaption>
                                </a>
                            </figure>
                        </li>
                        <li>
                            <figure class="categorys__figure">
                                <a href="" class="categorys__link">
                                    <img data-src="https://picsum.photos/120/120?random=4" width="120" height="120" alt="" uk-img="target: !.uk-slideshow-items" class="categorys__image uk-border-circle">
                                    <figcaption class="categorys__caption">Nome da Categoria</figcaption>
                                </a>
                            </figure>
                        </li>
                        <li>
                            <figure class="categorys__figure">
                                <a href="" class="categorys__link">
                                    <img data-src="https://picsum.photos/120/120?random=5" width="120" height="120" alt="" uk-img="target: !.uk-slideshow-items" class="categorys__image uk-border-circle">
                                    <figcaption class="categorys__caption">Nome da Categoria</figcaption>
                                </a>
                            </figure>
                        </li> 
                        <li>
                            <figure class="categorys__figure">
                                <a href="" class="categorys__link">
                                    <img data-src="https://picsum.photos/120/120?random=6" width="120" height="120" alt="" uk-img="target: !.uk-slideshow-items" class="categorys__image uk-border-circle">
                                    <figcaption class="categorys__caption">Nome da Categoria</figcaption>
                                </a>
                            </figure>
                        </li>

                    </ul>          

                </div>

            </div>

        </section>


        <!-- Brands -->
        <section class="brands uk-section uk-section-small">

            <div class="uk-container uk-container-small">

                <h2 class="brands__title">Compre por Marca</h2>

                <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true">

                    <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@s uk-grid uk-grid-small">
                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=1" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>

                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=2" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>

                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=3" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>

                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=4" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>

                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=5" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>

                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=6" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>

                        <li>
                            <figure class="brands__figure">
                                <a href="" class="brands__link">
                                    <img data-src="https://picsum.photos/300/80?random=7" width="300" height="80" alt="" uk-img="target: !.uk-slideshow-items" class="brands__image uk-border-rounded">
                                </a>
                            </figure>
                        </li>
                        

                    </ul>          

                </div>

            </div>

        </section>
    

        <!-- Showcase -->
        <section class="showcase showcase--featured uk-section uk-section-xsmall">

            <div class="uk-container uk-container-small">

                <div class="showcase__header uk-grid uk-grid-collapse uk-grid-match" uk-grid>

                    <div class="uk-width-expand">
                        <h2 class="showcase__title">OFERTAS ESPECIAIS</h2>
                    </div>

                    <div>
                        <a href="" class="showcase__allview">Ver todos</a>
                    </div>

                </div>

                <ul class="showcase__list uk-grid uk-grid-small uk-child-width-1-1">

                    <li class="showcase__list-item">
                        <div class="uk-card uk-card-default uk-card-body uk-card-small uk-border-rounded">

                            <button class="showcase__giftlist">
                                <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                            </button>

                            <div class="uk-flex uk-flex-middle uk-flex-center">
                                <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                    <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                </figure>
                            </div>

                            <h3 class="showcase__name">
                                <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                            </h3>

                            <div class="showcase__data">
                                <strong class="showcase__offer">R$ 3.349,00</strong>
                                <em class="showcase__installments">12x de R$279,08 sem juros</em>
                            </div>

                            <div class="showcase__labels">
                                <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                            </div>
                        </div>
                    </li>

                    <li class="showcase__list-item showcase__list-item--left">

                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>

                            <button class="showcase__giftlist">
                                <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                            </button>

                            <div class="uk-flex uk-flex-middle uk-flex-center">
                                <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                    <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                </figure>
                            </div>

                            <div>
                                <div class="uk-card-body uk-card-small">
                                    <h3 class="showcase__name">
                                        <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                                    </h3>
                                    <div class="showcase__data">
                                        <strong class="showcase__offer">R$ 3.349,00</strong>
                                        <em class="showcase__installments">12x de R$279,08 sem juros</em>
                                    </div>
        
                                    <div class="showcase__labels">
                                        <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                    </li>

                    <li class="showcase__list-item showcase__list-item--left">

                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>

                            <button class="showcase__giftlist">
                                <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                            </button>

                            <div class="uk-flex uk-flex-middle uk-flex-center">
                                <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                    <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                </figure>
                            </div>

                            <div>
                                <div class="uk-card-body uk-card-small">
                                    <h3 class="showcase__name">
                                        <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                                    </h3>
                                    <div class="showcase__data">
                                        <strong class="showcase__offer">R$ 3.349,00</strong>
                                        <em class="showcase__installments">12x de R$279,08 sem juros</em>
                                    </div>
        
                                    <div class="showcase__labels">
                                        <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </li>

                    <li class="showcase__list-item showcase__list-item--left">

                        <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>

                            <button class="showcase__giftlist">
                                <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                            </button>

                            <div class="uk-flex uk-flex-middle uk-flex-center">
                                <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                    <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                </figure>
                            </div>

                            <div>
                                <div class="uk-card-body uk-card-small">
                                    <h3 class="showcase__name">
                                        <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                                    </h3>
                                    <div class="showcase__data">
                                        <strong class="showcase__offer">R$ 3.349,00</strong>
                                        <em class="showcase__installments">12x de R$279,08 sem juros</em>
                                    </div>
        
                                    <div class="showcase__labels">
                                        <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </li>

                </ul>

            </div>

        </section>


        <!-- Showcase -->
        <section class="showcase showcase--featured uk-section uk-section-xsmall">

                <div class="uk-container uk-container-small">
    
                    <div class="showcase__header uk-grid uk-grid-collapse uk-grid-match" uk-grid>
    
                        <div class="uk-width-expand">
                            <h2 class="showcase__title">Produtos para Artesanato</h2>
                        </div>
    
                        <div>
                            <a href="" class="showcase__allview">Ver todos</a>
                        </div>
    
                    </div>
    
                    <ul class="showcase__list uk-grid uk-grid-small uk-child-width-1-1">

    
                        <li class="showcase__list-item showcase__list-item--left">
    
                            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>
    
                                <button class="showcase__giftlist">
                                    <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                                </button>
    
                                <div class="uk-flex uk-flex-middle uk-flex-center">
                                    <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                        <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                    </figure>
                                </div>
    
                                <div>
                                    <div class="uk-card-body uk-card-small">
                                        <h3 class="showcase__name">
                                            <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                                        </h3>
                                        <div class="showcase__data">
                                            <strong class="showcase__offer">R$ 3.349,00</strong>
                                            <em class="showcase__installments">12x de R$279,08 sem juros</em>
                                        </div>
            
                                        <div class="showcase__labels">
                                            <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                           
                        </li>
    
                        <li class="showcase__list-item showcase__list-item--left">
    
                            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>
    
                                <button class="showcase__giftlist">
                                    <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                                </button>
    
                                <div class="uk-flex uk-flex-middle uk-flex-center">
                                    <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                        <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                    </figure>
                                </div>
    
                                <div>
                                    <div class="uk-card-body uk-card-small">
                                        <h3 class="showcase__name">
                                            <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                                        </h3>
                                        <div class="showcase__data">
                                            <strong class="showcase__offer">R$ 3.349,00</strong>
                                            <em class="showcase__installments">12x de R$279,08 sem juros</em>
                                        </div>
            
                                        <div class="showcase__labels">
                                            <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            
                        </li>
    
                        <li class="showcase__list-item showcase__list-item--left">
    
                            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-border-rounded" uk-grid>
    
                                <button class="showcase__giftlist">
                                    <svg class="icon icon-giftlist"><use xlink:href="#icon-giftlist"></use></svg>
                                </button>
    
                                <div class="uk-flex uk-flex-middle uk-flex-center">
                                    <figure class="showcase__figure uk-card-media-left uk-cover-container">
                                        <img src="<?php bloginfo('template_url'); ?>/dist/produto.jpg" alt="" class="showcase__image">
                                    </figure>
                                </div>
    
                                <div>
                                    <div class="uk-card-body uk-card-small">
                                        <h3 class="showcase__name">
                                            <a href="" class="showcase__link">Plotter de Recorte Inteligente Cricut</a>
                                        </h3>
                                        <div class="showcase__data">
                                            <strong class="showcase__offer">R$ 3.349,00</strong>
                                            <em class="showcase__installments">12x de R$279,08 sem juros</em>
                                        </div>
            
                                        <div class="showcase__labels">
                                            <span class="showcase__label frete-gratis">FRETE GRÁTIS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            
                        </li>
    
                    </ul>
    
                </div>
    
        </section>


        <!-- Newsletter -->
        <section class="newsletter  uk-section uk-section-xsmall">

                <div class="uk-container uk-container-small">

                    <div class="newsletter__header">
                        <svg class="icon icon-mail"><use xlink:href="#icon-mail"></use></svg>
                        Cadastre-se para <strong>receber novidades</strong>
                    </div>

                    <div class="newletter__content">

                        <form class="newsletter__form">
                            <input class="newsletter__input" type="mail" placeholder="Seu Email">
                            <button class="newsletter__button" type="button">Enviar <svg class="icon icon-mail-2"><use xlink:href="#icon-mail-2"></use></svg></button>
                        </form>

                    </div>

                </div>

        </section>


    </main>
    
    


    <!-- Footer -->
    <footer class="footer">

        <div class="footer__section footer__section--first  uk-section uk-section-small">

            <div class="uk-container uk-container-small">

                <div class="uk-grid uk-child-width-1-2" uk-grid>

                    <div>
                        <h6 class="footer__list-title">Institucional</h6>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Quem Somos</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Lojas</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Trabalhe Conosco</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Termos e condições</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Política de Privacidade</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h6 class="footer__list-title">Minha Conta</h6>
                        <ul class="footer__list">
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Meu Painel</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Meus Pedidos</a>
                            </li>
                            <li class="footer__list-item">
                                <a href="" class="footer__list-link" title="">Central de Atendimento</a>
                            </li>
                        </ul>
                    </div>

                    





                </div>

            </div>

        </div>

        <div class="footer__section footer__section--second  uk-section uk-section-xsmall">

                <div class="uk-container uk-container-small">

                    <div class="uk-grid uk-grid-collapse" uk-grid>

                        <div class="uk-width-expand">
                            <svg width="191" height="32" viewBox="0 0 191 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.6946 15.3689C23.6946 9.65286 26.0558 4.48859 29.8537 0.811567C27.5913 0.307819 25.0629 -0.0348665 22.4662 0.00282896C19.9821 0.0370975 17.4195 0.427759 15.0309 1.27419C12.3114 4.40977 10.6667 8.50829 10.6667 12.9906C10.6667 22.8497 18.624 30.8377 28.4376 30.8377C29.2019 30.8377 29.956 30.7863 30.6931 30.6938C26.4073 26.9825 23.6946 21.4961 23.6946 15.3689Z" fill="#DB0962"/>
                                <path d="M24.882 15.3689C24.882 21.4961 27.7654 26.9448 32.2422 30.4265C33.4536 30.1592 34.6206 29.772 35.7261 29.2716C35.6886 29.2408 35.6511 29.2099 35.6135 29.1791C35.5589 29.1311 35.5077 29.0832 35.4566 29.0352C35.4122 28.9941 35.3678 28.9529 35.3235 28.9118C35.2689 28.857 35.2177 28.8022 35.1665 28.7473C35.129 28.7062 35.088 28.6685 35.0505 28.6274C34.9959 28.5691 34.9447 28.5074 34.8935 28.4458C34.8594 28.4046 34.8253 28.3669 34.7912 28.3258C34.74 28.2607 34.6888 28.1956 34.641 28.1305C34.6103 28.0894 34.5796 28.0517 34.5489 28.0105C34.5011 27.942 34.4534 27.8735 34.4056 27.8015C34.3783 27.7604 34.351 27.7227 34.3237 27.6816C34.2793 27.6096 34.235 27.5342 34.1906 27.4622C34.1667 27.4211 34.1394 27.3834 34.1156 27.3423C34.0712 27.2669 34.0337 27.1881 33.9927 27.1127C33.9722 27.0716 33.9484 27.0305 33.9279 26.9893C33.8869 26.9105 33.8528 26.8317 33.8187 26.7495C33.7982 26.7083 33.7777 26.6638 33.7607 26.6227C33.7266 26.5404 33.6958 26.4616 33.6617 26.3794C33.6447 26.3348 33.6242 26.2903 33.6105 26.2491C33.5798 26.1669 33.5559 26.0847 33.5286 26.0024C33.515 25.9579 33.4979 25.9099 33.4843 25.8619C33.457 25.7797 33.4365 25.694 33.416 25.6083C33.4024 25.5603 33.3887 25.5158 33.3785 25.4678C33.358 25.3821 33.341 25.2965 33.3239 25.2108C33.3137 25.1628 33.3034 25.1149 33.2932 25.0634C33.2796 24.9744 33.2659 24.8853 33.2557 24.7962C33.2488 24.7482 33.2386 24.7002 33.2352 24.6488C33.2215 24.5528 33.2181 24.4569 33.2079 24.3575C33.2045 24.313 33.1977 24.2718 33.1977 24.2273C33.1874 24.0868 33.184 23.9429 33.184 23.8024C33.184 23.6824 33.1874 23.5659 33.1908 23.446C33.1942 23.4049 33.1977 23.3672 33.1977 23.3295C33.2045 23.2506 33.2079 23.1718 33.2147 23.0964C33.2181 23.0485 33.225 23.0039 33.2318 22.9559C33.2386 22.8874 33.2488 22.8189 33.2591 22.7503C33.2659 22.6989 33.2761 22.6509 33.283 22.603C33.2932 22.5379 33.3034 22.4727 33.3171 22.4111C33.3273 22.3597 33.3376 22.3117 33.3478 22.2603C33.3614 22.1986 33.3751 22.1369 33.3887 22.0752C33.4024 22.0238 33.416 21.9724 33.4297 21.921C33.4468 21.8628 33.4604 21.8045 33.4809 21.7463C33.4979 21.6948 33.5116 21.6434 33.5286 21.5955C33.5457 21.5372 33.5662 21.4824 33.5867 21.4276C33.6037 21.3762 33.6242 21.3247 33.6412 21.2768C33.6617 21.2219 33.6822 21.1705 33.7061 21.1157C33.7266 21.0643 33.747 21.0129 33.7709 20.9649C33.7914 20.9135 33.8153 20.8621 33.8392 20.8107C33.863 20.7593 33.8869 20.7079 33.9108 20.6599C33.9347 20.612 33.9586 20.564 33.9859 20.516C34.0132 20.4646 34.0371 20.4132 34.0678 20.3652C34.0917 20.3207 34.119 20.2761 34.1428 20.2316C34.1736 20.1802 34.2043 20.1288 34.235 20.0774C34.2589 20.0362 34.2862 19.9986 34.3135 19.9574C34.3476 19.9026 34.3817 19.8512 34.4158 19.7964C34.4363 19.769 34.4568 19.7381 34.4772 19.7107C34.6342 19.4845 34.8048 19.2686 34.9891 19.063C34.9959 19.0527 35.0061 19.0425 35.013 19.0356C35.0676 18.9739 35.1256 18.9157 35.1802 18.8574C35.1972 18.8368 35.2177 18.8163 35.2348 18.7992C35.2894 18.7443 35.344 18.6895 35.402 18.6347C35.4224 18.6141 35.4463 18.5935 35.4668 18.573C35.5248 18.5216 35.5828 18.4702 35.6408 18.4188C35.6647 18.3982 35.6886 18.3777 35.7125 18.3571C35.7705 18.3057 35.8319 18.2577 35.8933 18.2097C35.9172 18.1892 35.9411 18.172 35.9684 18.1515C36.0298 18.1035 36.0912 18.059 36.1561 18.011C36.18 17.9938 36.2073 17.9767 36.2311 17.9596C36.296 17.915 36.3608 17.8705 36.4256 17.8259C36.4495 17.8088 36.4734 17.7951 36.4973 17.778C36.5655 17.7334 36.6338 17.6923 36.7054 17.6512C36.7293 17.6374 36.7498 17.6272 36.7737 17.6135C36.8453 17.5723 36.9204 17.5312 36.9955 17.4901C37.016 17.4798 37.033 17.4695 37.0535 17.4593C37.132 17.4181 37.2139 17.377 37.2923 17.3393C37.306 17.3325 37.3196 17.329 37.3333 17.3222C37.422 17.2811 37.5073 17.2434 37.5994 17.2057C37.6029 17.2057 37.6029 17.2057 37.6063 17.2022C38.2 16.9589 38.8381 16.791 39.5001 16.7156C39.7628 16.6848 40.029 16.6711 40.2985 16.6711C40.0801 16.6711 39.8652 16.6608 39.6502 16.6402C39.5444 16.63 39.4386 16.6197 39.3329 16.6025C39.326 16.6025 39.3158 16.5991 39.309 16.5991C39.2066 16.5854 39.1077 16.5683 39.0087 16.5511C38.9951 16.5477 38.9848 16.5477 38.9712 16.5443C38.8756 16.5271 38.7801 16.5066 38.6845 16.4826C38.6675 16.4792 38.6538 16.4757 38.6368 16.4723C38.5446 16.4518 38.4525 16.4243 38.3604 16.4004C38.3433 16.3969 38.3263 16.3901 38.3092 16.3866C38.2205 16.3592 38.1318 16.3318 38.043 16.3044C38.026 16.2975 38.0089 16.2941 37.9884 16.2873C37.8997 16.2564 37.8144 16.2256 37.7291 16.1913C37.7121 16.1845 37.695 16.1776 37.6779 16.1708C37.5926 16.1365 37.5073 16.1022 37.4254 16.0645C37.4084 16.0577 37.3913 16.0508 37.3742 16.0405C37.2923 16.0028 37.207 15.9651 37.1251 15.924C37.1115 15.9172 37.0944 15.9069 37.0774 15.9C36.9955 15.8589 36.9136 15.8144 36.8317 15.7698C36.818 15.763 36.8078 15.7561 36.7942 15.7493C36.7123 15.7013 36.6304 15.6533 36.5485 15.6053C36.5382 15.5985 36.5314 15.595 36.5212 15.5882C36.4393 15.5368 36.354 15.482 36.2721 15.4237C36.2721 15.4237 36.2687 15.4237 36.2687 15.4203C35.8319 15.1187 35.4293 14.7692 35.071 14.3785C35.0642 14.3717 35.0607 14.3682 35.0539 14.3614C34.9993 14.2997 34.9447 14.238 34.8901 14.1763C34.8731 14.1558 34.8526 14.1318 34.8321 14.1112C34.7844 14.0564 34.74 13.9981 34.6956 13.9399C34.6717 13.909 34.6479 13.8782 34.624 13.8473C34.583 13.7925 34.5455 13.7377 34.5045 13.6829C34.4807 13.6452 34.4534 13.6109 34.4295 13.5732C34.3954 13.5218 34.3578 13.467 34.3237 13.4121C34.2964 13.371 34.2725 13.3299 34.2452 13.2888C34.2145 13.2374 34.1804 13.1825 34.1497 13.1311C34.1258 13.0866 34.0985 13.042 34.0746 12.9975C34.0473 12.9461 34.0166 12.8913 33.9893 12.8398C33.9654 12.7919 33.9415 12.7473 33.9176 12.6993C33.8938 12.6479 33.8665 12.5965 33.8426 12.5417C33.8187 12.4903 33.7982 12.4423 33.7743 12.3909C33.7504 12.3395 33.73 12.2881 33.7095 12.2333C33.689 12.1819 33.6685 12.1271 33.6481 12.0722C33.6276 12.0208 33.6071 11.9694 33.5901 11.9146C33.5696 11.8598 33.5525 11.8049 33.5321 11.7467C33.515 11.6953 33.4979 11.6439 33.4809 11.5925C33.4638 11.5342 33.4468 11.476 33.4331 11.4177C33.4195 11.3663 33.4058 11.3149 33.3922 11.2635C33.3785 11.2018 33.3649 11.1436 33.3478 11.0819C33.3376 11.0305 33.3239 10.9791 33.3137 10.9277C33.3034 10.8626 33.2898 10.8009 33.2796 10.7358C33.2693 10.6844 33.2625 10.6364 33.2523 10.585C33.242 10.5164 33.2352 10.4479 33.225 10.3794C33.2181 10.3314 33.2113 10.2868 33.2079 10.2389C33.2011 10.16 33.1942 10.0812 33.1908 10.0058C33.1874 9.96471 33.184 9.92702 33.184 9.8859C33.1772 9.76596 33.1772 9.64944 33.1772 9.5295C33.1772 9.44383 33.1772 9.35816 33.1806 9.27249C33.1806 9.24165 33.184 9.2108 33.184 9.17996C33.1874 9.12513 33.1874 9.0703 33.1908 9.01547C33.1942 8.98121 33.1977 8.94694 33.2011 8.9161C33.2045 8.86469 33.2079 8.81329 33.2147 8.76531C33.2181 8.73104 33.2215 8.69678 33.2284 8.66251C33.2352 8.61453 33.2386 8.56313 33.2454 8.51515C33.2523 8.48088 33.2557 8.44319 33.2625 8.40892C33.2693 8.36094 33.2761 8.31297 33.2864 8.26842C33.2932 8.23415 33.3 8.19646 33.3069 8.16219C33.3137 8.11764 33.3239 8.06966 33.3342 8.02511C33.341 7.99084 33.3478 7.95658 33.358 7.92231C33.3683 7.87776 33.3785 7.82978 33.3887 7.7818C33.399 7.74754 33.4058 7.71327 33.416 7.679C33.4297 7.63445 33.4399 7.58647 33.4536 7.54192C33.4638 7.50766 33.4741 7.47339 33.4843 7.43912C33.4979 7.39457 33.5116 7.35002 33.5252 7.30547C33.5355 7.2712 33.5457 7.24036 33.5594 7.20609C33.573 7.16154 33.5901 7.11699 33.6037 7.07587C33.614 7.0416 33.6276 7.01076 33.6412 6.97992C33.6583 6.93537 33.6754 6.89082 33.6924 6.8497C33.7061 6.81886 33.7197 6.78802 33.7334 6.75375C33.7504 6.7092 33.7709 6.66808 33.788 6.62353C33.8016 6.59269 33.8153 6.56184 33.8323 6.531C33.8528 6.48988 33.8699 6.44533 33.8903 6.40421C33.9074 6.37337 33.9211 6.34253 33.9381 6.31511C33.9586 6.27399 33.9791 6.23287 34.0029 6.19174C34.02 6.1609 34.0337 6.13349 34.0507 6.10264C34.0712 6.06152 34.0951 6.0204 34.119 5.97928C34.136 5.95186 34.1531 5.92102 34.1701 5.89361C34.194 5.85248 34.2179 5.81136 34.2418 5.77367C34.2589 5.74625 34.2793 5.71884 34.2964 5.69142C34.3203 5.6503 34.3476 5.6126 34.3749 5.57148C34.3919 5.54407 34.4124 5.51665 34.4295 5.48924C34.4568 5.45154 34.4841 5.41042 34.5114 5.37272C34.5284 5.34531 34.5489 5.32132 34.5694 5.29391C34.5967 5.25621 34.624 5.21851 34.6547 5.18082C34.6752 5.1534 34.6956 5.12942 34.7161 5.102C34.7468 5.06431 34.7741 5.02661 34.8048 4.99234C34.8253 4.96835 34.8458 4.94094 34.8697 4.91695C34.9004 4.88268 34.9311 4.84499 34.9618 4.81072C34.9823 4.78673 35.0061 4.76274 35.03 4.73875C35.0607 4.70449 35.0949 4.67022 35.1256 4.63595C35.146 4.61196 35.1699 4.58797 35.1938 4.56399C35.2245 4.52972 35.2587 4.49545 35.2928 4.46461C35.3167 4.44062 35.3405 4.42006 35.3644 4.39607C35.3986 4.3618 35.4327 4.33096 35.4668 4.30012C35.4907 4.27613 35.5146 4.25557 35.5419 4.23501C35.576 4.20416 35.6101 4.17332 35.6442 4.14248C35.6681 4.12192 35.6954 4.09793 35.7193 4.07737C35.7568 4.04653 35.791 4.01569 35.8285 3.98827C35.8558 3.96771 35.8797 3.94715 35.907 3.92659C35.9445 3.89917 35.9786 3.86833 36.0162 3.84092C36.0435 3.82036 36.0708 3.80322 36.0981 3.78266C36.1356 3.75525 36.1731 3.72783 36.2107 3.70042C36.238 3.67986 36.2653 3.66272 36.296 3.64216C36.3335 3.61475 36.371 3.59076 36.412 3.56677C36.4393 3.54621 36.47 3.52907 36.4973 3.51194C36.5348 3.48795 36.5758 3.46396 36.6133 3.43998C36.6406 3.42284 36.6713 3.40571 36.702 3.38857C36.7396 3.36458 36.7805 3.34402 36.8215 3.32004C36.8522 3.3029 36.8829 3.28577 36.9136 3.26863C36.9614 3.24122 37.0125 3.2138 37.0637 3.18639C35.7022 2.57298 33.672 1.79851 31.2527 1.16797C27.3388 4.63252 24.882 9.71113 24.882 15.3689Z" fill="#002D56"/>
                                <path d="M9.4792 12.9908C9.4792 8.9951 10.7076 5.28724 12.7993 2.22705C10.9772 3.37848 9.71805 4.39968 8.26444 5.64706C6.18297 7.51812 4.65429 9.99574 3.95137 12.8058C3.95137 12.8092 3.95137 12.8092 3.95137 12.8126C3.91384 12.96 3.88313 13.1073 3.849 13.2547C3.84218 13.2889 3.83194 13.3198 3.82512 13.3541C3.82853 13.3438 3.82171 13.3712 3.82512 13.3541C3.50096 14.5843 2.47728 17.9803 0 19.3065V21.4175C0 21.4175 2.96865 20.4648 5.24461 23.1926C5.30603 23.268 5.36745 23.3433 5.42887 23.4222C6.18639 24.7381 7.12816 25.9375 8.26444 26.9244C12.5639 30.8927 18.4534 31.9927 23.6946 31.9962C24.5306 31.9962 25.3495 31.955 26.1514 31.8865C16.7575 30.7556 9.4792 22.7265 9.4792 12.9908Z" fill="#E7A614"/>
                                <path d="M91.9803 27.7191H87.8344V10.626H91.9803V27.7191Z" fill="#002D56"/>
                                <path d="M91.9803 7.21603H87.8344V4.31348H91.9803V7.21603Z" fill="#002D56"/>
                                <path d="M98.4465 27.719H94.3006V11.599C96.3752 10.7937 99.651 10.1221 102.36 10.1221C107.141 10.1221 109.284 12.0377 109.284 18.182V27.719H105.138V18.6172C105.138 14.8237 104.435 13.8813 101.494 13.8813C100.422 13.8813 99.4531 14.015 98.4499 14.2857V27.719H98.4465Z" fill="#002D56"/>
                                <path d="M115.125 14.2518V21.6058C115.125 23.7202 115.695 24.5941 117.702 24.5941C118.804 24.5941 119.776 24.3919 120.612 24.1246L121.349 27.4178C120.145 27.853 118.306 28.1888 116.668 28.1888C112.856 28.1888 110.983 27.0477 110.983 21.9759V14.2518V10.6262V7.73735L115.129 6.02393V10.6228H120.78V14.2518H115.125Z" fill="#002D56"/>
                                <path d="M133.842 3.7417C135.981 3.7417 138.725 4.1118 140.53 4.61555L139.561 8.51189C138.356 8.07667 136.182 7.77168 134.609 7.77168C129.525 7.77168 127.621 8.64553 127.621 15.8317C127.621 23.0178 129.529 24.1247 134.609 24.1247C136.182 24.1247 138.356 23.8231 139.561 23.3844L140.53 27.3459C138.725 27.8496 135.981 28.1855 133.842 28.1855C126.451 28.1855 122.905 25.3309 122.905 15.794C122.909 6.22617 126.451 3.7417 133.842 3.7417Z" fill="#002D56"/>
                                <path d="M163.016 22.9181C163.016 24.563 163.385 25.7041 164.32 26.9481L160.675 28.5279C159.505 27.1846 158.87 25.5739 158.87 23.086V3.47412H163.016V22.9181Z" fill="#002D56"/>
                                <path d="M64.1159 4.31348H51.9786V8.07617H56.3941H58.7519H62.9831C64.7882 8.07617 65.7572 9.45376 65.7572 12.3083C65.7572 14.9607 64.7199 16.3041 62.8807 16.3041H56.3941V11.5818H51.9786V27.7189H56.3941V19.9948H64.2183C68.6986 19.9948 70.606 16.3692 70.606 12.3392C70.606 7.77118 69.033 4.31348 64.1159 4.31348Z" fill="#002D56"/>
                                <path d="M78.4951 10.1255L72.22 10.1221V13.6346H78.403C81.1908 13.7648 81.7811 14.6181 81.7811 17.3425C80.3445 17.0409 79.007 16.873 77.567 16.873C73.5883 16.873 70.879 17.644 70.879 22.4793C70.879 26.9445 72.6841 28.1885 78.0686 28.1885C80.4435 28.1885 83.6203 27.6847 85.7598 26.8451V16.7702C85.7564 11.6984 83.4736 10.1426 78.4951 10.1255ZM81.7777 24.4292C80.8086 24.765 79.57 25.0015 78.3655 25.0015C75.8575 25.0015 75.2228 24.6314 75.2228 22.3148C75.2228 20.1319 76.0588 19.8646 78.3996 19.8646C79.6382 19.8646 80.8393 19.964 81.7777 20.1662V24.4292Z" fill="#002D56"/>
                                <path d="M148.623 10.1221C145.116 10.1221 142.748 10.9651 141.519 13.4804H148.623C151.599 13.4804 152.503 14.2514 152.503 19.1553C152.503 23.8912 151.599 24.8301 148.623 24.8301C145.716 24.8301 144.812 23.8912 144.812 19.1553C144.812 17.7982 144.884 16.7599 145.044 15.9649H140.765C140.611 16.873 140.533 17.9079 140.533 19.0867C140.533 26.1049 143.208 28.1885 148.627 28.1885C154.11 28.1885 156.785 26.1049 156.785 19.0867C156.782 12.1028 154.076 10.1221 148.623 10.1221Z" fill="#002D56"/>
                                <path d="M173.075 10.1221C169.568 10.1221 167.196 10.9651 165.971 13.4804H173.075C176.051 13.4804 176.955 14.2514 176.955 19.1553C176.955 23.8912 176.051 24.8301 173.075 24.8301C170.165 24.8301 169.264 23.8912 169.264 19.1553C169.264 17.7982 169.336 16.7599 169.499 15.9649H165.221C165.067 16.873 164.985 17.9079 164.985 19.0867C164.985 26.1049 167.66 28.1885 173.079 28.1885C178.562 28.1885 181.238 26.1049 181.238 19.0867C181.234 12.1028 178.528 10.1221 173.075 10.1221Z" fill="#002D56"/>
                                <path d="M191 10.1392C190.775 10.1289 190.546 10.1221 190.307 10.1221C187.598 10.1221 184.322 10.7937 182.248 11.599V27.719H186.393V14.2857C187.397 14.0184 188.366 13.8813 189.437 13.8813C190.051 13.8813 190.567 13.9259 191 14.0253V10.1392Z" fill="#002D56"/>
                            </svg>
                        </div>

                        <div>
                            <div class="social">
                                <ul class="social__list uk-flex uk-flex-middle uk-flex-center">
                                    <li class="social__list-item">
                                        <a class="social__list-link" href="" title="">
                                            <svg class="icon icon-whatsapp"><use xlink:href="#icon-whatsapp"></use></svg>
                                        </a>
                                    </li>
                                    <li class="social__list-item">
                                        <a class="social__list-link" href="" title="">
                                            <svg class="icon icon-instagram"><use xlink:href="#icon-instagram"></use></svg>
                                        </a>
                                    </li>
                                    <li class="social__list-item">
                                        <a class="social__list-link" href="" title="">
                                            <svg class="icon icon-youtube"><use xlink:href="#icon-youtube"></use></svg>
                                        </a>
                                    </li>
                                    <li class="social__list-item">
                                        <a class="social__list-link" href="" title="">
                                            <svg class="icon icon-social-facebook"><use xlink:href="#icon-social-facebook"></use></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <div class="footer__copyright uk-text-center uk-margin-large">

                        <p>
                            Paint Color Ltda Me. CNPJ: 09.433.975/0001-88.
                            Rua General Couto de Magalhães, 217, Santa Efigênia.
                            São Paulo, SP. CEP: 01212-030.
                            
                            Copyright © 2004 - 2019 . Todos os direitos reservados. 
                        </p>
                    </div>

                </div>

            </div>
                    

        </div>

    </footer>

    
</body>
</html>