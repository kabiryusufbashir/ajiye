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
        <div class="text-center text-2xl">
            {{ date('F', mktime(null, null, null, $month, 1)) }}, {{ $year }} Report
        </div>
        <div class="my-2">
            <table class="w-full">
                <!-- Main Columns  -->
                <tr class="text-left">
                    <th>No</th>
                    <th>Date</th>
                    <th>Details</th>
                    <th>Total</th>
                    @foreach($report_columns as $column)
                        <th class="">
                            {{ $column->account_name }}
                        </th>
                    @endforeach
                </tr>
                <!-- Datas  -->
                @foreach($reports as $report)
                    <tr class="text-left">
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $report->day }}</td>
                        <td>{{ !empty($report->details) ? $report->details : 'Nill'}}</td>
                        <td>
                            @if($report->account_id != $imprest_id->id)
                                {{ $report->record_amount }}
                            @endif    
                        </td>
                        @foreach($report_columns as $column)
                            <td>
                                @if($column->id == $report->account_id)
                                    {{ $report->record_amount }}
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                <!-- Total  -->
                <tr class="text-left">
                    <th></th>
                    <th></th>
                    <th>Balance c/d</th>
                    <th>
                        {{ $balance_month }}
                    </th>
                    @foreach($report_columns as $column)
                        <th>
                            {{ \App\Models\Record::where('account_id', $column->id)->where('month', $month)->where('year', $year)->where('client_id', Auth::guard('staff')->user()->client_id)->sum('record_amount') }}
                        </th>
                    @endforeach
                </tr>
            </table>
        </div>
    </div>
    <!-- Trademark  -->
    <div id="trademark" class="flex flex-row justify-between border-b my-12 text-center justify-content">
        <div>Imprest System</div>
        <div>A Product of Team Piccolo v 1.0</div>
    </div>
</div>