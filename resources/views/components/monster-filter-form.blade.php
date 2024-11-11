                        <div class="font-medium flex items-center gap-2">
                            <form action="{{ route('monsters.index') }}" method="GET" class="flex gap-4">

                                <!-- Search Bar -->
                                <div class="mb-4 relative">
                                    <input type="text" name="search" id="search-bar" value="{{ request('search') }}" placeholder="Search Monsters" class="border rounded px-4 py-2 w-full" />
                                    
                                    <!-- Dynamic Search Results Dropdown -->
                                    <ul id="search-results" class="absolute bg-white border rounded shadow-lg w-full mt-1 hidden">
                                        <!-- List items will be inserted here by JavaScript -->
                                    </ul>
                                </div>

                                <!-- Alignment Filter -->
                                <div class="mb-4">
                                    <select name="alignment_filter" id="alignment-filter" class="border rounded px-4 py-2">
                                        <option value="showingAll">Show All</option>
                                        @foreach($alignments as $alignment)
                                            <option value="{{ $alignment }}" {{ request('alignment_filter') == $alignment ? 'selected' : '' }}>
                                                {{ $alignment }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Sorting Buttons -->
                                <div class="mb-4">
                                    <button type="submit" name="sort" value="az" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                                        A-Z
                                    </button>
                                    <button type="submit" name="sort" value="za" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 cursor-pointer">
                                        Z-A
                                    </button>
                                </div>

                                
                            </form>
                        </div>