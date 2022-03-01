<div id="menu" class="p-6">
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
                            @if(Auth::user()->staff_type == 1)
                                <th>Action</th>
                            @endif
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
                            @if(Auth::user()->staff_type == 1)
                                <td></td>
                            @endif
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
                                @if(Auth::user()->staff_type == 1)
                                    <!-- Action  -->
                                    <td class="flex px-2 justify-center">
                                        <form action="{{ route('client-delete-received', $refill->id) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="relative top-2">
                                                <span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                            </button>
                                        </form>
                                    </td>
                                @endif
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
                                @if(Auth::user()->staff_type == 1)
                                    <!-- Action  -->
                                    <td class="flex px-2 justify-center">
                                        <form action="{{ route('client-delete-report', $report->id) }}" method="POST">
                                            @csrf 
                                            @method('DELETE')
                                            <button class="relative top-2">
                                                <span><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></span>
                                            </button>
                                        </form>
                                    </td>
                                @endif
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
                            @if(Auth::user()->staff_type == 1)
                                <th></th>
                            @endif
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
                            <th>Received</th>
                            <th class="text-right">{{ ($received->sum('record_amount') + $balance_month_bd ) }}</th>
                            @if(Auth::user()->staff_type == 1)
                                <th></th>
                            @endif
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
                            <th>Expenditure</th>
                            <th class="text-right">{{ ($reports->sum('record_amount')) }}</th>
                            @if(Auth::user()->staff_type == 1)
                                <th></th>
                            @endif
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
                            <th class="text-right">{{ ($received->sum('record_amount') + $balance_month_bd ) - ($reports->sum('record_amount')) }}</th>
                            @if(Auth::user()->staff_type == 1)
                                <th></th>
                            @endif
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