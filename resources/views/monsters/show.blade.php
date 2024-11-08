<x-app-layout>
    <div class="min-h-screen bg-backgroundpaper bg-cover">
        <div class>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">Monster Details</h3>
                            <x-monster-details
                                :monster_name="$monster->monster_name"
                                :alignment="$monster->alignment"
                                :challenge_rating="$monster->challenge_rating"
                                :armour_class="$monster->armour_class"
                                :image_url="$monster->image_url"
                                :description="$monster->description"
                                :created_at="$monster->created_at"
                                :updated_at="$monster->updated_at"
                                :monster_id="$monster->id"
                                :favourited_by_users_count="$monster->favourited_by_count"
                            />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>