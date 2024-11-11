                        <div class="font-medium flex items-center gap-2 border-b border-double mb-5">
                            <form action="{{ route('monsters.index') }}" method="GET" class="flex gap-1">

                                <!-- Search Bar -->
                                <div class="mb-4 w-100">
                                    <input type="text" name="search" id="search-bar" value="{{ request('search') }}" placeholder="Search Monsters" class="border rounded px-4 py-2 w-full" />
                                    
                                    <!-- Dynamic Search Results Dropdown -->
                                    <ul id="search-results" class="absolute bg-white border rounded shadow-lg w-full mt-1 hidden w-1/2 md:w-100">
                                        <!-- List items will be inserted here by JavaScript -->
                                    </ul>
                                </div>

                                <!-- Sorting Buttons -->
                                <button type="submit" name="sort" value="az" class="px-2 py-1 sm:px-4 sm:py-2 mb-4 bg-rose-500 text-sm text-white rounded-md hover:bg-rose-600 flex gap-2 items-center">
                                    A-Z
                                </button>
                                <button type="submit" name="sort" value="za" class="px-2 py-1 sm:px-4 sm:py-2 mb-4 bg-rose-500 text-sm text-white rounded-md hover:bg-rose-600 flex gap-2 items-center">
                                    Z-A
                                </button>

                                <!-- Button to toggle visibility -->
                                <button type="button" id="filter-toggle" class="px-2 py-1 sm:px-4 sm:py-2 mb-4 bg-rose-500 text-sm text-white rounded-md hover:bg-rose-600 flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5" />
                                </svg>
                                <span class="hidden md:inline">Show Filters</span>
                                </button>

                                <!-- Hidden form elements that will be toggled -->
                                <div id="filter-form" class="hidden flex items-center gap-1">
                                    <!-- Alignment Filter -->
                                    <div class="mb-4 flex gap-1">
                                        <select name="alignment_filter" id="alignment-filter" class="border rounded px-4 py-2">
                                            <option value="showingAll">All Alignments</option>
                                            @foreach($alignments->sort() as $alignment)
                                                <option value="{{ $alignment }}" {{ request('alignment_filter') == $alignment ? 'selected' : '' }}>
                                                    {{ $alignment }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="text-sm text-white mb-4">
                                        <button type="submit" class="px-2 py-2 sm:px-4 sm:py-2 bg-rose-500 rounded-md hover:bg-rose-600 flex gap-2 items-center">
                                            Go
                                        </button>
                                    </div>
                                </div>


                                
                            </form>
                            @vite('resources/js/filter.js') <!--Loads the filter.js script to dynamically display names-->
                        </div>