<x-app-layout>
    <x-slot name="header">
    
    </x-slot>
    @php
        $user = auth()->user();
    @endphp
 <body>
    <div style="column-count: 2">
       <div>
       <canvas id="canvas" width="500" height="500"></canvas>
       </div>

       <div>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Best score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($scores) && count($scores)>0)
                                @foreach($scores as $score)
                                @if ($user->id == $score->user_id && $score->game_id == 1)
                                <tr>
                                  <th scope="row">
                                    {{ $user->id }}
                                  </th>
                                  <td>
                                    {{ $user->name }}
                                  </td>
                                  <td>
                                    {{ $score->best_score }} 
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg"> 
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                  <th scope="col">Id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Best score</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($scores) && count($scores)>0)
                                @foreach($scores as $score)
                                @foreach($users as $User)
                                @if ($User->id == $score->user_id && $score->game_id == 1)
                                <tr>
                                  <th scope="row">
                                    {{ $User->id }}
                                  </th>
                                  <td>
                                    {{ $User->name }}
                                  </td>
                                  <td>
                                    {{ $score->best_score }}
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 	
 	<script type="text/javascript">

        var canvas = null, ctx = null,muro = [], x = 0, y = 0, tecla = 0, velocidad = 1;
        var comida = null, jugador = null, cont = 0;
        var fin = false, pause = false;
        window.requestAnimationFrame = (function(){
            return window.requestAnimationFrame || 
            window.mozRequestAnimationFrame || 
            window.webkitRequestAnimationFrame || 
            function (callback){
                window.setTimeout(callback,17);
            }
        }());

        function paint(ctx)
        {
            ctx.fillStyle = "black";
            ctx.fillRect(0,20,canvas.width,canvas.height - 20);
               
            ctx.fillStyle = "#0f0";
            jugador.paint(ctx);

            ctx.fillStyle = "red";
            comida.paint(ctx);

            ctx.fillStyle = "white";
            for (var i = muro.length - 1; i >= 0; i--) {
                muro[i].paint(ctx);
            }

            if (pause && !fin) {
            velocidad=0;
            ctx.fillStyle = "red";
            ctx.font = "18px Arial";
            ctx.fillText("Pause:presione espacio para continuar", 0, 15);
            }

            if (fin) {
                velocidad=0;
                ctx.fillStyle = "red";
                ctx.font = "22px Arial";
                ctx.fillText("FIN DEL JUEGO :C", 150, 270);
                setTimeout("reset()", 1000);
            }
           
        }

        function act(){

            if(!pause){
                if((tecla == 39 || tecla == 40 || tecla == 38 || tecla == 37)&& !fin){
                    velocidad=cont+1;
                    switch(tecla){
                    case 39: jugador.x += velocidad; break;
                    case 40: jugador.y += velocidad; break;
                    case 38: jugador.y -= velocidad; break;
                    case 37: jugador.x -= velocidad; break;
                    }
                    ctx.clearRect(0, 0, canvas.width, 20);
                }
            }
            if(jugador.x < -10){
                jugador.x = canvas.width;
            }
            if(jugador.x > canvas.width){
                jugador.x = -10;
            }
            if(jugador.y < 20 ){
                jugador.y = canvas.height;
            }
            if(jugador.y > canvas.height){
                jugador.y = 20;
            }

           
           if(jugador.intersects(comida)){
                comida.x = random(canvas.width);
                y = random(canvas.height);
                while(y<20){
                    y = random(canvas.height);
                }
                comida.y = y;
                ctx.clearRect(0, 0, canvas.width, 20);
                cont++
            }

            for (var i = muro.length - 1; i >= 0; i--) {
                if(muro[i].intersects(jugador)){
                    fin = true;
                    
                }
            }

            point(cont);
            
        }

        function run(){
            window.requestAnimationFrame(run);
            act();
            paint(ctx);
        }

        function init(){
            canvas = document.getElementById('canvas');
            ctx = canvas.getContext('2d');

            jugador = new Rectangle(0,20,10,10);
            comida = new Rectangle(75,110,10,10);
            muro.push(new Rectangle(50,70,10,10));
            muro.push(new Rectangle(400,70,10,10));
            muro.push(new Rectangle(50,350,10,10));
            muro.push(new Rectangle(400,350,10,10));
            run();

        } 
        
        window.addEventListener('load',init,false);

        document.addEventListener("keydown", function(evt){
         console.log(evt.keyCode);
         switch(evt.keyCode){
            case 39: tecla = 39; break;
            case 40: tecla = 40; break;
            case 38: tecla = 38; break;
            case 37: tecla = 37; break;
            case 32: pause = (pause)?false:true;  break;
         }
        });

        function Rectangle(x,y,w,h){
            this.x = x;
            this.y = y;
            this.w = w;
            this.h = h;

            this.paint = function(ctx){
                ctx.fillRect(this.x,this.y,this.w,this.h);
            }

            this.intersects = function(rect){
                if (this.x < rect.x + rect.w && this.x + this.w > rect.x && 
                    this.y < rect.y + rect.h && this.y + this.h > rect.y){
                    return true;
                }
            }
        }

        function random(j){
            return Math.floor(Math.random()*j);
        }

        function point(cont) {
            ctx.fillStyle = "red";
            ctx.font = "20px Arial";
            ctx.fillText("Puntaje:" + cont, 370, 15);
        }

        function reset(){
            caseScore();
            fin = false;
            cont = 0;
            velocidad = cont + 1 ;
            jugador.x = 0;
            jugador.y = 20;
            comida.x = 75;
            comida.y = 110;
        }

        function caseScore(){
            if (fin) {
            @if (isset($scores) && count($scores)>0)
            @php
                $found=false;
            @endphp
            @foreach ($scores as $score)
                @if ($score->user_id == $user->id)
                     $found = true;
                     updateScore( {{  $score->id }},{{  $user->id }},1, cont, cont, this);   
                @endif    
            @endforeach
            @if ($found)
                storeScore({{  $user->id }},1, cont, cont, this);
            @endif
            @else
                storeScore({{  $user->id }},1, cont, cont, this);
            @endif
            }
        }

        function storeScore(user_id, game_id, score, best_score) { 
            if (fin) {
                axios.post('/scores', {
                user_id: user_id,
                game_id: game_id,
                score: score,
                best_score: best_score
            }).then(function (response) {
                if (response.data.code == 200) {
                    console.log(response.data.message);    
                } else {
                    console.log(response.data.message);
                }   
            }).catch(function (error) {
            });
            }              
        }


        function updateScore(id, user_id, game_id, score, best_score) { 
            if (fin) {
                axios.put('/scores', {
                id: id,
                user_id: user_id,
                game_id: game_id,
                score: score,
                best_score: best_score
            }).then(function (response) {
                if (response.data.code == 200) {
                    console.log(response.data.message);    
                } else {
                    console.log(response.data.message);
                }   
            }).catch(function (error) {
            });
            }              
        }
  </script>
 </body>
</x-app-layout>