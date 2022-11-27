@extends('layouts.template')
@section('content')
<div class="container" style="width: 85%;background: #fff;border-radius: 6px;padding: 20px 60px 30px 40px;box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);">
    <div class="content" style="display: flex;align-items: center;justify-content: space-between;">
      <div class="left-side" style="width: 25%;height: 100%;display: flex;flex-direction: column;align-items: center;justify-content: center;margin-top: 15px;position: relative;">
        <div class="address details" style="margin: 14px;text-align: center;">
          <i class="fas fa-map-marker-alt" style="font-size: 30px;color: #A98467;margin-bottom: 10px;"></i>
          <div class="topic" style="font-size: 18px;font-weight: 500;">Address</div>
          <div class="text-one" style="font-size: 14px;color: #afafb6;"><a href="https://goo.gl/maps/9AjgBSko7tS2JWwH7" class="text-decoration-none">{{$setting->address}}</a></div>
        </div>
        <div class="phone details" style="margin: 14px;text-align: center;">
          <i class="fas fa-phone-alt" style="font-size: 30px;color: #A98467;margin-bottom: 10px;"></i>
          <div class="topic" style="font-size: 18px;font-weight: 500;">Phone</div>
          <div class="text-one" style="font-size: 14px;color: #afafb6;"><a href="https://wa.me/{{$setting->phone1}}" class="text-decoration-none">{{$setting->phone1}}</a></div>
          <div class="text-two" style="font-size: 14px;color: #afafb6;"><a href="https://wa.me/{{$setting->phone2}}" class="text-decoration-none">{{$setting->phone2}}</a></div>
        </div>
        <div class="email details" style="margin: 14px;text-align: center;">
          <i class="fas fa-envelope" style="font-size: 30px;color: #A98467;margin-bottom: 10px;"></i>
          <div class="topic" style="font-size: 18px;font-weight: 500;">Email</div>
          <div class="text-one" style="font-size: 14px;color: #afafb6;"><a href="mailto:{{$setting->email1}}" class="text-decoration-none">{{$setting->email1}}</a></div>
          <div class="text-two" style="font-size: 14px;color: #afafb6;"><a href="mailto:{{$setting->email2}}" class="text-decoration-none">{{$setting->email2}}</a></div>
        </div>
      </div>
      <div class="right-side" style="width: 75%;margin-left: 75px;">
        <div class="topic-text" style="font-size: 23px;font-weight: 600;color: #A98467;">Kirimi kami pesan</div>
        <p>Jika Anda ingin berkerjasama dengan kami maupun memberi saran dan kritik mengenai bisnis kami, Anda dapat mengirimi saya pesan dari sini. Ini kesenangan saya untuk membantu Anda.</p>
      <form action="{{ url('/contact') }}" method="post">
        <div class="input-box" style="height: 50px;width: 100%;margin: 12px 0;">
          <input type="text" placeholder="Enter your name" style="height: 100%;width: 100%;border: none;outline: none;font-size: 16px;background: #F0F1F8;border-radius: 6px;padding: 0 15px;resize: none;" >
        </div>
        <div class="input-box" style="height: 50px;width: 100%;margin: 12px 0;">
          <input type="text" placeholder="Enter your email" style="height: 100%;width: 100%;border: none;outline: none;font-size: 16px;background: #F0F1F8;border-radius: 6px;padding: 0 15px;resize: none;">
        </div>
        <div class="input-box message-box" style="height: 50px;width: 100%;margin: 12px 0;min-height: 110px;">
          <textarea name="" placeholder="Enter your message" cols="30" rows="10" style="height: 100%;width: 100%;border: none;outline: none;font-size: 16px;background: #F0F1F8;border-radius: 6px;padding: 0 15px;resize: none;padding-top: 6px;"></textarea>
        </div>
        <div class="btn">
          <input type="button"> Send Now
        </div>
      </form>
    </div>
    </div>
  </div>
@endsection