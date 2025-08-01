@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="tax-returns-title">
        Hi John, welcome back
    </h2>

    <div class="grin_box_border tax_returns_box">
        <h3>Your {{ date('Y') }} Tax Return</h3>
        <p>
            The {{ date('Y') }} tax return is for income you received between 1 July {{ date('Y') - 1 }} and 30 June {{ date('Y') }}.
        </p>
        <p>
            Just add your income, bank interest, any more deductions, health cover and other items, then you should be done! Your return was started, but not signed.
        </p>
        <a href="{{ route('tax-returns.create') }}" class="navbar_btn mt-4">
            Start My {{ date('Y') }} Tax Return
        </a>
{{--         <a href="{{ route('tax-returns.create') }}" class="navbar_btn mt-4">
            Finish My {{ date('Y') }} Tax Return
        </a> --}}
    </div>

    <div class="grin_box_border tax_returns_box">
        <h3>Previous Years' Tax Returns</h3>
        <div class="" style="border: 1px solid #15a1b780; border-radius: 16px;">
            <table class="tax_returns_table">
                <thead class="">
                    <tr>
                        <th>Year</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2024</td>
                        <td>Lodged</td>
                    </tr>
                    <tr>
                        <td>2023</td>
                        <td>Lodged</td>
                    </tr>
                    <tr>
                        <td>2022</td>
                        <td>Lodged</td>
                    </tr>
                    <tr>
                        <td>2021</td>
                        <td>Lodged</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection