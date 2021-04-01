<x-app-layout>
    <x-slot name="header">
    
    </x-slot>

      <body>
          <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url(/fondo.jpg); background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">


              <div class="row row-cols-1 row-cols-md-3 g-4">
               <div class="col">
                <div class="card">
                  <img src="{{url('book_cover_5.jpg')}}" style="max-height: 300px" class="card-img-top p-2" alt="...">
                  <div class="card-body" >
                    <h5 class="card-title">Juego 1</h5>
                    <p class="card-text">Descripción.</p>
                  </div>
                  <div align="center" style="padding-bottom: 10px;">
                    <button class="btn btn-danger">Play</button>
                    <button class="btn btn-primary">Instructions</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="{{url('book_cover_4.jpg')}}" style="max-height: 300px" class="card-img-top p-2" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Juego 2</h5>
                    <p class="card-text">Descripción.</p>
                  </div>
                  <div align="center" style="padding-bottom: 10px;">
                    <button class="btn btn-danger">Play</button>
                    <button class="btn btn-primary">Instructions</button>
                  </div>
                </div>
              </div>
              <div class="col">
                <div class="card">
                  <img src="{{url('book_cover_6.jpg')}}" style="max-height: 300px" class="card-img-top p-2" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">Juego 3</h5>
                    <p class="card-text">Descripción.</p>
                  </div>
                  <div align="center" style="padding-bottom: 10px;">
                    <button class="btn btn-danger">Play</button>
                    <button class="btn btn-primary">Instructions</button>
                  </div>
                </div>
              </div>
              </div> 
            </div>
          </div>
        </body>
</x-app-layout>
