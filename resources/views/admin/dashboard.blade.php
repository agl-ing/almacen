@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<h1 class="text-align-center">Almacenes COPPEL</h1>
<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input onchange="obtenerValor(this, 'pareto')" type="checkbox" name="options" id="pareto" autocomplete="off" checked> Pareto
  </label>
  <label class="btn btn-secondary">
    <input onchange="obtenerValor(this, 'linea')" type="checkbox" name="options" id="linea" autocomplete="off"> Linea
  </label>
  <label class="btn btn-secondary">
    <input onchange="obtenerValor(this, 'barras')" type="checkbox" name="options" id="barras" autocomplete="off"> Barras
  </label>
</div>
<div id="graficas" class="row">

    <div id="container"></div>

</div>

<script>
    addEventListener("load", (event) => {
        let data = {{ Illuminate\Support\Js::from($warehouses) }};

        graficas(data, "pareto");

    });

    function obtenerValor(e, tipo){
        let data = {{ Illuminate\Support\Js::from($warehouses) }};
        graficas(data, tipo);
    }

    function graficas(data, tipo)
    {
        const groupedData = groupBy(data, 'warehouse_id');
        let graficas = document.getElementById("graficas");
        graficas.innerHTML  ="";
        for(let key in groupedData){
            let title;
            let bodyGraf = [];
            const div = document.createElement("div");
            div.setAttribute('id', key);
            div.classList.add('margin-top');
            let warehouses = groupedData[key];

            for(let j = 0; j < warehouses.length; j++){
                console.log(warehouses[j]);
                title = `${warehouses[j].wh} : ${warehouses[j].name}`;
                bodyGraf.push({
                    x: `${warehouses[j].created_at}`,
                    value: warehouses[j].qty
                })
            }

            graficas.appendChild(div);

            switch (tipo) {
                case "barras":
                    chart = anychart.column();
                    var series = chart.column(bodyGraf);
                    chart.container(key);
                    chart.title(title);
                    chart.draw();
                    break;
                case "linea":
                    chart = anychart.stepLine();
                    var series = chart.stepLine(bodyGraf);
                    series.stepDirection("forward");
                    chart.container(key);
                    chart.title(title);
                    chart.draw();
                    break;
                default:
                    chart = anychart.pareto(bodyGraf);
                    chart.title(title);
                    chart.container(key);
                    chart.draw();
                    break;
            }

            title = "";
            bodyGraf = [];
        }
    }

    function groupBy(arr, key) {
        return arr.reduce((acc, obj) => {
            const keyValue = obj[key];
            if (!acc[keyValue]) {
                acc[keyValue] = [];
            }
            acc[keyValue].push(obj);
            return acc;
        }, {});
    }
</script>
@endsection