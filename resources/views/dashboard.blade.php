<x-app-layout>
    <x-slot name="header">
    
    </x-slot>

      <body>
          <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url(/fondo.jpg); background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">


              <div class="row row-cols-1 row-cols-md-3 g-4">
               @if (isset($games) && count($games)>0)
               @foreach ($games as $game)
               <div class="col">
                <div class="card">
                  <img src="{{url( $game->cover )}}" style="max-height: 300px" class="card-img-top p-2" alt="...">
                  <div class="card-body" >
                    <h5 class="card-title">{{ $game->title }}</h5>
                    <p class="card-text">{{ $game->description }}</p>
                  </div>
                  <div align="center" style="padding-bottom: 10px;">
                    <a class="btn btn-danger" href="{{ url('/games/'.$game->id) }}">Play</a>
                    <button class="btn btn-primary">Instructions</button>
                  </div>
                </div>
              </div>
              @endforeach
              @endif
              </div> 
            </div>
          </div>
        </body>
</x-app-layout>
