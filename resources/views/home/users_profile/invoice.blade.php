<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>فاکتور سفارش #{{ $order->ref_id }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; direction: rtl; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>فاکتور سفارش #{{ $order->ref_id }}</h2>
    <p>تاریخ ثبت سفارش: {{ verta($order->created_at)->format('%d %B، %Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>محصول</th>
                <th>تعداد</th>
                <th>قیمت</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price) }} تومان</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p style="text-align: right; margin-top: 20px;">
        جمع کل: {{ number_format($order->paying_amount) }} تومان
    </p>
</body>
</html>
