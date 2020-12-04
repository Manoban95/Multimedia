<x-app-layout>
    <x-slot name="header">
        <div class="row">
        <div class="col-md-8 col-12">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Biblioteca') }}
            </h2>


        </div>
      </div>  
    </x-slot>

    <body>
        <div style="width: 100%; height: 100%; background-image:url({{url('body_background.jpg')}}); background-repeat: no-repeat; background-attachment: fixed; background-size: cover; " >
            
         {{--  <div style="background-color: white" class="row col-6">
            <canvas id="myChart" width="400" height="400"></canvas>
          </div> --}}

          

            <div class="card-deck" style="margin-left: 15%;">
              <div class="card">
                <img src="{{url('book_cover_5.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body" >
                  <h5 class="card-title">El señor de los anillos</h5>
                  <p class="card-text">Frodo Bolsón es un hobbit al que su tío Bilbo hace portador del poderoso Anillo Único, capaz de otorgar un poder ilimitado al que la posea, con la finalidad de destruirlo. Sin embargo, fuerzas malignas muy poderosas quieren arrebatárselo.</p>
                </div>
              </div>
              <div class="card" style="margin-left: auto; margin-right: auto;">
                <img src="{{url('book_cover_4.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Lus juegos del hambre</h5>
                  <p class="card-text">En lo que alguna vez fue Norteamérica, la Capital de Panem mantiene sus 12 distritos obligándolos a seleccionar a un niño y a una niña, llamados Tributos, a competir en un evento televisado nacionalmente llamado los Juegos del Hambre. Cada ciudadano debe ver pelear a muerte a los jóvenes. El Tributo del Distrito 12, Katniss Everdeen, solo confía en sus habilidades de caza y buenos instintos en una arena en donde debe sobrevivir contra la humanidad.</p>
                </div>
              </div>
              <div class="card" style="margin-right: 15%;">
                <img src="{{url('book_cover_6.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Divergente</h5>
                  <p class="card-text">En una sociedad futura, la gente está dividida entre facciones basadas en sus personalidades. Después de que una joven descubre que ella es una Divergente y nunca será de algún grupo, descubre un complot para destruir a quienes con como ella.</p>
                </div>
              </div>
            </div>

         {{-- background-image: url(images/body_background.jpg);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover; --}}
        </div>
        <form method="POST" action="{{ url('loans/all')}}" id="form1" enctype="multipart/form-data">
          @csrf
        </form>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script>



      /*var loans =*/ /*<?php echo json_encode($data) ?>*/ /*;*/
      /*
      var valores = [];


      

      var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
              datasets: [{
                  label: '# of Votes',
                  data: [12, 19, 3, 5, 2, 3],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
              scales: {
                  yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
              }
          }
      });*/

      /*for (var i = 1; i< loans.length ; i++) {
        console.log(1);
      }*/


      

      /*var booksName[];
      var quantity[];*/

      

    </script>
</x-app-layout>
