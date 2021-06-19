@extends('layouts.event_layout')
@section('title', 'Event List')
@section('content')
    <div class="container grid px-6 mx-auto">

        <!-- With actions -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">

        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">N0.</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Room</th>
                        <th class="px-4 py-3">Attending</th>
                        <th class="px-4 py-3">Comment</th>
                        <th class="px-4 py-3">Date</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach($guests['data'] as $guest)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $guest['name'] }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ $guest['slug'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $guest['email'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['phone'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['number_of_guest'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['reserved_for'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['room_needed'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['attending'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['comment'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ date('d M Y', strtotime($guest['created_at'])) }}</td>
                            <td>{{  $guest['status'] }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('downloadTicket', $guest['id']) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        download
                                    </a>

                                    <a href="{{ route('sendTicket', $guest['id']) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        Send Email
                                    </a>

                                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"
                                            ></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">Showing {{ $guests['last_page'] }}-{{ $guests['to'] }} of {{ $guests['total'] }}</span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                        @foreach($guests['links'] as $guest)
                            @if ($loop->first)
                                <li>
                                    <a href="{{ $guest['url'] }}" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="Previous">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                            @elseif ($loop->last)
                                <li>
                                   <a href="{{ $guest['url'] }}" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple" aria-label="Next">
                                       <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                           <path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                       </svg>
                                   </a>
                               </li>
                            @else
                                <li>
                                    <a href="{{ $guest['url'] }}" class="@if($guest['active']) {{ "px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple" }} @else
                                    {{ "px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple" }} @endif">{{ $guest['label'] }}</a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                  </nav>
            </span>
            </div>
        </div>
    </div>
@endsection
