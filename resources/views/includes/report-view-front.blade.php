<div id="menu" class="my-4">
    <!-- Notification -->
    <div class="text-xl mb-10 flex flex-row justify-between border-b py-2">
        <div>
            Welcome <b>{{ Auth::user()->staff_username }}</b>
        </div>
        <div>
            Balance: <b>N{{ $balance }}</b>
        </div>
    </div>
    <!-- Message  -->
    <div class="py-1 mb-8 text-center">
        @include('layouts.messages')
    </div>
    <!-- Section  -->
    <div id="homeBar" class="">
        @if(count($data_count) > 0)
            <div class="text-center text-2xl">
                {{ date('F', mktime(null, null, null, $month, 1)) }}, {{ $year }} Report
            </div>
            <div class="my-2">
                <table class="overflow-x-scroll">
                    <tbody>
                        <!-- Main Columns  -->
                        <tr class="text-left">
                            <th>No</th>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Received</th>
                            @foreach($report_columns as $column)
                                <th class="">
                                    {{ $column->account_name }}
                                </th>
                            @endforeach
                            <th></th>
                            <th></th>
                        </tr>
                        <!-- Balance B/D  -->
                        <tr class="text-left">
                            <td>1</td>
                            <td>01</td>
                            <th>Balance b/d</th>
                            <td>{{ $balance_month_bd }}</td>
                            @foreach($report_columns as $column)
                                <td></td>
                            @endforeach
                            <td></td>
                            <td></td>
                        </tr>
                        <!-- Received  -->
                        @foreach($received as $refill)
                            <tr class="text-left">
                                <td>{{ $loop->index + 2 }}</td>
                                <td class="">
                                    {{ $refill->day }}
                                </td>
                                <td class="">
                                    {{ $refill->details }}
                                </td>
                                <td class="">
                                    {{ $refill->record_amount }}
                                </td>
                                <td>
                                    @foreach($report_columns as $column)
                                        <td></td>
                                    @endforeach
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                        <!-- Datas  -->
                        @foreach($reports as $report)
                            <tr class="text-left">
                                <td>{{ count($received) + $loop->index + 1 + 1 }}</td>
                                <td>{{ $report->day }}</td>
                                <td>{{ !empty($report->details) ? $report->details : ''}}</td>
                                <td></td>
                                @foreach($report_columns as $column)
                                    <td>
                                        @if($column->id == $report->account_id)
                                            {{ $report->record_amount }}
                                        @endif
                                    </td>
                                @endforeach
                                <td></td>
                                <td></td>
                            </tr>
                        @endforeach
                        <!-- Total  -->
                        <tr class="text-left">
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>{{ $balance_month_bd + $received->sum('record_amount') }}</th>
                            @foreach($report_columns as $column)
                                <th>
                                    {{ \App\Models\Record::where('account_id', $column->id)->where('month', $month)->where('year', $year)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount') }}
                                </th>
                            @endforeach
                            <th>
                                {{ ($reports->sum('record_amount')) }}
                            </th>
                            <th></th>
                        </tr>
                        <!-- B/D - C/D  -->
                        <tr class="text-left">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            @foreach($report_columns as $column)
                                <th></th>
                            @endforeach
                            <th>{{ ($received->sum('record_amount') + $balance_month_bd ) }}</th>
                            <th></th>
                        </tr>
                        <!-- B/D - C/D  -->
                        <tr class="text-left">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            @foreach($report_columns as $column)
                                <th></th>
                            @endforeach
                            <th>{{ ($reports->sum('record_amount')) }}</th>
                            <th></th>
                        </tr>
                        <!-- Balance C/D  -->
                        <tr class="text-left">
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            @foreach($report_columns as $column)
                                <th></th>
                            @endforeach
                            <th>Balance c/d</th>
                            <th>{{ ($received->sum('record_amount') + $balance_month_bd ) - ($reports->sum('record_amount')) }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center text-2xl">
                No Record found for {{ date('F', mktime(null, null, null, $month, 1)) }}, {{ $year }}
            </div>
        @endif
    </div>
    <!-- Trademark  -->
    <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
        <div>Imprest System</div>
        <div>A Product of Team Piccolo v 1.0</div>
    </div>
</div>