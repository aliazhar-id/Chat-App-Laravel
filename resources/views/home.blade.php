<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chat App Template</title>
  <link rel="stylesheet" href="{{ asset('trash/css/chat.css') }}">
</head>

<body>
  <div id="app" class="app">

    <!-- LEFT SECTION -->

    <section id="main-left" class="main-left">
      <!-- header -->
      <div id="header-left" class="header-left">
        Mini Chat
      </div>

      <!-- chat list -->
      <div id="chat-list" class="chat-list">
        <!-- user lists -->
        @foreach ($friends as $friend)
          <div class="friends" data-id="{{ $friend->id_user }}" data-name="{{ $friend->name }}"
            data-avatar="/assets/guest.jpeg">
            <!-- photo -->
            <div class="profile friends-photo">
              <img src="/assets/guest.jpeg" alt="">
            </div>

            <div class="friends-credent">
              <!-- name -->
              <span class="friends-name">{{ $friend->name }}</span>
              <!-- last message -->
              <span class="friends-message friend-status">Offline</span>
            </div>
          </div>
        @endforeach
      </div>
    </section>



    <!-- RIGHT SECTION -->
    <section id="main-empty" class="main-right">
      <p style="text-align: center; font-size: 35px">Welcome to mini chat</p>
    </section>
    <section id="main-right" class="main-right hidden">
      <!-- header -->
      <div id="header-right" class="header-right">
        <!-- profile pict -->
        <div id="header-img" class="profile header-img">
          <img src="/assets/guest.jpeg" alt="">
        </div>

        <!-- name -->
        <h4 class="name friend-name">Mario Gomez</h4>
      </div>

      <!-- chat area -->
      <div id="chat-area" class="chat-area">
        <!-- chat content -->

      </div>

      <!-- typing area -->
      <div id="typing-area" class="typing-area">
        <!-- input form -->
        <input id="type-area" class="type-area" placeholder="Type something...">
      </div>
    </section>
  </div>
  <div id="creator" class="creator">
    <p>Login as <span>{{ auth()->user()->name }}</span></p>
  </div>

  {{-- url --}}
  <input type="hidden" id="room-url" value="{{ route('room.create') }}">
  <input type="hidden" id="message-url" value="{{ route('chat.save') }}">
  <input type="hidden" id="load-chat-url" value="{{ route('chat.load', ':roomId') }}">

  @vite('resources/js/app.js')
  <script src="{{ asset('trash/js/chat.js') }}"></script>
</body>

</html>
