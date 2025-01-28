{{-- resources/views/emails/order.blade.php --}}  
<!DOCTYPE html>  
<html>  
<head>  
    <style>  
        /* Reset & Base */  
        * {  
            margin: 0;  
            padding: 0;  
            box-sizing: border-box;  
        }  

        body {  
            font-family: 'Segoe UI', Arial, sans-serif;  
            line-height: 1.6;  
            color: #2d3748;  
            background-color: #f7fafc;  
            -webkit-font-smoothing: antialiased;  
            padding: 40px 0;  
        }  

        /* Invoice Container */  
        .invoice-container {  
            max-width: 800px;  
            margin: 0 auto;  
            background-color: #ffffff;  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  
            border-radius: 8px;  
        }  

        /* Invoice Header */  
        .invoice-header {  
            background-color: #1a202c;  
            color: #ffffff;  
            padding: 30px 40px;  
            border-radius: 8px 8px 0 0;  
        }  

        .invoice-header h1 {  
            font-size: 28px;  
            font-weight: 700;  
            margin-bottom: 10px;  
        }  

        .invoice-header p {  
            color: #e2e8f0;  
            font-size: 14px;  
        }  

        /* Company Info */  
        .company-info {  
            text-align: right;  
            margin-top: -50px;  
            padding: 0 40px;  
        }  

        .company-info img {  
            max-width: 150px;  
            margin-bottom: 10px;  
        }  

        /* Main Content */  
        .invoice-content {  
            padding: 40px;  
        }  

        /* Two Column Layout */  
        .info-columns {  
            display: flex;  
            justify-content: space-between;  
            margin-bottom: 40px;  
            border-bottom: 2px solid #edf2f7;  
            padding-bottom: 30px;  
        }  

        .info-column {  
            flex: 1;  
            padding-right: 20px;  
        }  

        .info-column h2 {  
            font-size: 16px;  
            text-transform: uppercase;  
            color: #718096;  
            margin-bottom: 15px;  
            letter-spacing: 0.5px;  
        }  

        .info-column p {  
            margin-bottom: 8px;  
            color: #4a5568;  
        }  

        .info-column strong {  
            color: #2d3748;  
            font-weight: 600;  
        }  

        /* Items Table */  
        .items-table {  
            width: 100%;  
            border-collapse: collapse;  
            margin-bottom: 30px;  
        }  

        .items-table th {  
            background-color: #f8fafc;  
            padding: 12px 15px;  
            text-align: left;  
            font-weight: 600;  
            color: #718096;  
            font-size: 14px;  
            text-transform: uppercase;  
            letter-spacing: 0.5px;  
            border-bottom: 2px solid #edf2f7;  
        }  

        .items-table td {  
            padding: 15px;  
            border-bottom: 1px solid #edf2f7;  
        }  

        .items-table tr:last-child td {  
            border-bottom: 2px solid #edf2f7;  
        }  

        .quantity-col {  
            text-align: center;  
            width: 100px;  
        }  

        .price-col {  
            text-align: left;  
            width: 150px;  
            font-family: 'Courier New', monospace;  
            font-weight: 600;  
        }  

        /* Totals Section */  
        .totals-section {  
            width: 100%;    
            margin-bottom: 40px;  
        }  

        .totals-row {  
            display: flex;  
            justify-content: space-between;  
            padding: 10px 0;  
            font-size: 14px;  
        }  

        .totals-row.final {  
            font-size: 18px;  
            font-weight: 700;  
            border-top: 2px solid #edf2f7;  
            margin-top: 10px;  
            padding-top: 15px;  
            color: #1a202c;  
        }  

        /* Footer */  
     /* Update the invoice-footer section in your existing CSS */  
.invoice-footer {  
    align-items: center;
    background-color: #f8fafc;  
    padding: 30px 40px;  
    border-radius: 0 0 8px 8px;  
    border-top: 2px solid #edf2f7;  
}  

.invoice-footer p {  
    color: #718096;  
    font-size: 14px;  
    margin-bottom: 12px;  
}  

/* Add these new styles for the button and flex container */  
.flex {  
    display: flex;  
    margin-top: 20px;  
}  

.items-center {  
    align-items: center;  
}  

.gap-2 {  
    gap: 0.5rem;  
}  

/* Button styles */  
.invoice-footer a {  
    display: inline-flex;  
    align-items: center;  
    padding: 8px 16px;  
    font-size: 14px;  
    font-weight: 600;  
    color: #1f2937;  
    background-color: #ffffff;  
    border: 1px solid #e5e7eb;  
    border-radius: 6px;  
    text-decoration: none;  
    transition: all 150ms ease-in-out;  
}  

.invoice-footer a:hover {  
    background-color: #f9fafb;  
}  

/* SVG icon styles */  
.invoice-footer svg {  
    fill: #4b5563;  
    margin-right: 6px;  
    transition: fill 150ms ease-in-out;  
}  

.invoice-footer a:hover svg {  
    fill: #2563eb;  
}  

/* Badge styles */  
.invoice-footer span {  
    display: inline-flex;  
    align-items: center;    
    margin-left: 4px;  
    padding: 2px 8px;  
    font-size: 12px;  
    font-weight: 500;  
    color: #4b5563;  
    background-color: #f3f4f6;  
    border-radius: 9999px;  
    transition: all 150ms ease-in-out;  
}  

.invoice-footer a:hover span {  
    background-color: #e5e7eb;  
}  

        /* Status Badge */  
        .status-badge {  
            display: inline-block;  
            padding: 6px 12px;  
            border-radius: 9999px;  
            font-size: 12px;  
            font-weight: 600;  
            text-transform: uppercase;  
            letter-spacing: 0.5px;  
            background-color: #ebf8ff;  
            color: #2b6cb0;  
        }  

        /* Additional Styles */  
        .order-id {  
            color: #2b6cb0;  
            font-weight: 700;  
        }  

        .date {  
            color: #718096;  
            font-size: 14px;  
        }  

        @media screen and (max-width: 768px) {  
            body {  
                padding: 20px;  
            }  

            .invoice-container {  
                margin: 0;  
            }  

            .invoice-header,  
            .invoice-content,  
            .invoice-footer {  
                padding: 20px;  
            }  

            .info-columns {  
                flex-direction: column;  
            }  

            .info-column {  
                padding-right: 0;  
                margin-bottom: 20px;  
            }  

            .totals-section {  
                width: 100%;  
            }  
        }  
    </style>  
</head>  
<body>  
    <div class="invoice-container">  
        <div class="invoice-header">  
            <h1>New Order Received</h1>  
            <p>Order #{{ $cart->id }} • {{ $cart->created_at->format('F d, Y') }}</p>  
        </div>  


        <div class="invoice-content">  
            <div class="info-columns">  
                <div class="info-column">  
                    <h2>Billed To</h2>  
                    <p><strong>Name: {{ $cart->name }}</strong></p>  
                    <p>Email: {{ $cart->email }}</p>  
                    <p>Phone: {{ $cart->phone }}</p>  
                    <p>Address: {{ $cart->address }}</p>  
                    <p>Province: {{ $cart->city }}</p>  
                </div>  

                <div class="info-column">  
                    <h2>Order Details</h2>  
                    <p><strong>Order ID:</strong> <span class="order-id">#{{ $cart->id }}</span></p>  
                    <p><strong>Order Date:</strong> <span class="date">{{ $cart->created_at->format('M d, Y H:i:s') }}</span></p>  
                    <p><strong>Order Status:</strong> <span class="status-badge">{{ ucfirst($cart->status) }}</span></p>  
                    @if($cart->note)  
                        <p><strong>Notes:</strong> {{ $cart->note }}</p>  
                    @endif  
                </div>  
            </div>  

            <table class="items-table">  
                <thead>  
                    <tr>  
                        <th>Item Name</th>  
                        <th class="quantity-col">QTY</th>  
                        <th class="price-col">Price</th>  
                        <th class="price-col">Total</th>  
                    </tr>  
                </thead>  
                <tbody>  
                    @foreach($sessionCart['items'] as $item)  
                        <tr>  
                            <td>{{ $item['name'] }}</td>  
                            <td class="quantity-col">{{ $item['quantity'] }}</td>  
                            <td class="price-col">{{ number_format($item['price'], 0) }} IQD</td>  
                            <td class="price-col">{{ number_format($item['price'] * $item['quantity'], 0) }} IQD</td>  
                        </tr>  
                    @endforeach  
                </tbody>  
            </table>  

            <div class="totals-section">  
                <div class="totals-row">  
                    <span>Subtotal: </span>  
                    <span>{{ number_format($cart->total_amount, 0) }} IQD</span>  
                </div>  
                <div class="totals-row">  
                    <span>Shipping: </span>  
                    <span>Free</span>  
                </div>  
                <div class="totals-row final">  
                    <span>Total Amount: </span>  
                    <span>{{ number_format($cart->total_amount, 0) }} IQD</span>  
                </div>  
            </div>  
        </div>  

        <div class="invoice-footer">  
            <p>This is a system generated invoice for H5 Administrators.</p>  
            <p>You can see all the order details in the admin panel.</p>  
            <div class="flex items-center gap-2">  
                <a href="{{ route('cart.details', $cart->id) }}"   
                   class="group relative inline-flex items-center gap-1.5 px-4 py-2 bg-white text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 rounded-md transition-all duration-150 ease-in-out">  
                   <h5>Details</h5>
                   <span class="ml-1 inline-flex items-center justify-center bg-gray-100 px-2 py-0.5 rounded-full text-xs font-medium text-gray-600 group-hover:bg-gray-200">  
                        {{ $cart->items->count() }}  
                    </span>  
                </a>  
            </div> 
        </div>  
    </div>  
</body>  
</html>