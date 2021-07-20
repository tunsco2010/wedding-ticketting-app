@extends('layouts.event_layout')
@section('title', 'Event List')
@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Import Guest List.
        </h2>
        <form class="form row col-md-12" action="{{ route('importGuest', $weddingEvent->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 form-group">
                <input type="file" class="form-control" name="guests">
                <button type="submit" class="btn btn-primary form-control font-semibold text-purple-100 bg-purple-600 justify-between p-4 mb-8 text-sm focus:shadow-outline-purple">
                    <i class="fa fa-upload"> Upload</i>
                </button>
            </div>

        </form>
        <!-- With actions -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            @if (Session::has('message'))
                <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
                    {{ session('message') }}
                </div>
            @endif
        </h4>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Guest List
        </h2>
        <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
           href="{{ route('exportGuest', $weddingEvent->id ) }}">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span>Export </span>
            </div>
            <span>Guest List &RightArrow;</span>
        </a>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Contact</th>
                        <th class="px-4 py-3">N0. & Type</th>
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
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $guest['email'] }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">{{ $guest['phone'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{ $guest['reserved_for'] }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">NO: {{ $guest['number_of_guest'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $guest['room_needed'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['attending'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ $guest['comment'] }}</td>
                            <td class="px-4 py-3 text-sm">{{ date('d M Y', strtotime($guest['created_at'])) }}</td>
                            <td class="px-4 py-3 text-sm">{{  $guest['status'] == 1 ? 'IN': 'OUT' }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route('downloadTicket', $guest['id']) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        download
                                    </a>

                                    <a href="{{ route('sendTicket', $guest['id']) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                        Send Email
                                    </a>
                                    <form action="{{ route('deleteGuest', $guest['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"
                                                ></path>
                                            </svg>
                                        </button>
                                    </form>

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
