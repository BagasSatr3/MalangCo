@extends('layouts.template')
@section('content')
<div class="container" style="height:50vh;">
  <div class="col">
    <div class="d-flex flex-column align-items-center">
      <br>
      <br>
      <h2></h2>
        <div class="d-flex flex-column align-items-center">
          <h2>Selamat datang di Kojo!</h2>
          <h7>Sebuah platform jual beli berbagai macam</h7>
          <h7>alat dan bahan perkebunan yang berkualitas </h7>
        </div>
    </div>
  </div>
  
  <div class="container">
   <div class="row">
    <div class ="row mt-4">
    <!--Card 1-->
     <div class="col-md-4">
      <div class="card card-circle">
         <div class="card-icon">
         <image src="{{ asset('images/slide1.jpg') }}" style="max-height: 200px; max-width: 200px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
         </div>
         <div class="card-body">
            <h5 class="card-title">Apple</h5>
            <p class="card-text">Some quick example text to build on the card title and card content.</p>
         </div>
      </div>
      </div>
      <!--Card 2-->
      <div class="col-md-4">
      <div class="card card-circle">
         <div class="card-icon">
            <image src="{{ asset('images/slide1.jpg') }}" style="max-height: 200px; max-width: 200px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
         </div>
         <div class="card-body">
            <h5 class="card-title">Cookie</h5>
            <p class="card-text">Some quick example text to build on the card title and card content.</p>
         </div>
      </div>
      </div>
      <!--Card 2-->
      <div class="col-md-4">
      <div class="card card-circle ">
         <div class="card-icon">
         <image src="{{ asset('images/slide1.jpg') }}" style="max-height: 200px; max-width: 200px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
         </div>
         <div class="card-body">
            <h5 class="card-title">Carrot</h5>
            <p class="card-text">Some quick example text to build on the card title and card content.</p>
           
         </div>
      </div>
    </div>
   </div>
</div>
</div>
@endsection