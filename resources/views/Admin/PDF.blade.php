<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            margin: auto;
            font-family: Arial, Helvetica, sans-serif;
            color: #1F2937;
            font-size: 0.750rem;
            border-collapse: collapse;
            border: 1px solid #D1D5DB;
            width: 100%;
        }
        tr th{
            text-transform: uppercase;
            font-family: Arial, Helvetica, sans-serif;
            color: #6B7280
            
        }
        thead tr{
           background-color: #f9fafb
        }
        tr th, tr td{
            text-align: left;
            padding: 8px 20px;
            border-bottom: 1px solid #D1D5DB;
            border-right: none
        }

        tr:last-child td{
            text-align: right;
            background-color: #f9fafb;
        }

        .text-dark{
            color: #1F2937;
        }

        .text-gray-400{
            color: #9CA3AF
        }

        .bg-gray-500{
            background-color: #f9fafb
        }
        .mt-3{
            margin-top: 5px;
        }

        .mr-3{
            margin-right: 5px
        }

        .text-sm{
            font-size: 0.827rem
        }
        .text-center{
            text-align: center;
        }
        .blue{
            color: #2563EB
        }

         .deteils-container{
            background-color: #f9fafb;
            margin-top: 5px;
            padding: 8px 20px;
            margin: 15px 0px 15px;
            border: 1px solid #D1D5DB;
         }   
    
      

    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th><span class="mr-3 ">Order Deteils:</span><span class="text-dark">{{$orders[0]->user->name}}</span></th>
                <th><span class="mr-3">Positions:</span><span class="text-dark">{{$orders[0]->products_count}}</span></th>
            </tr>
        </thead>
    </table>
    <table class="mt-3">
        <thead >
        <tr>
            <th scope="col">
            Product 
            </th>
            <th scope="col">
             Ordered Pieces
            </th>
            <th scope="col">
            Price
            </th>
            <th scope="col">
            Total
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders[0]->products as $order)
                <tr>
                    <td>
                        <div>{{$order->name}}</div>
                        <div class="text-gray-400 mt-3 text-sm">{{$order->description}}</div>
                    </td>
                    <td class="text-center">{{$order->pivot->quantity}}</td>
                    <td>{{number_format($order->price / 100, 2, '.', '')}} Eur</td>
                    <td>{{number_format($order->total_price / 100, 2, '.', '')}} Eur</td>
                </tr>
        @endforeach
        <tr><td colspan="4"><span>Total Amount:</span> <span class="blue">{{number_format($total_amount / 100, 2, '.', '')}} Eur</span> </td></tr>
        </tbody>
</body>
</html>