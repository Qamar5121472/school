@extends('frontend.layout.navbar')
@section('title', 'SQA School')
@section('content')
    <div class="content">
        <h1>Web Design & <br><span>Development</span> <br>Course</h1>
        <p class="par">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt neque
            expedita atque eveniet <br> quis nesciunt. Quos nulla vero consequuntur, fugit nemo ad delectus
            <br> a quae totam ipsa illum minus laudantium?
        </p>

        <button class="cn"><a href="#">JOIN US</a></button>

        <div class="form">
            <h2>Login Here</h2>
            <input type="email" name="email" placeholder="Enter Email Here">
            <input type="password" name="" placeholder="Enter Password Here">
            <button class="btnn"><a href="#">Login</a></button>

            <p class="link">Don't have an account<br>
                <a href="#">Sign up </a> here</a>
            </p>
            <p class="liw">Log in with</p>

            <div class="icons">
                <a href="#"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#"><ion-icon name="logo-instagram"></ion-icon></a>
                <a href="#"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#"><ion-icon name="logo-google"></ion-icon></a>
                <a href="#"><ion-icon name="logo-skype"></ion-icon></a>
            </div>

        </div>
    </div>
@endsection