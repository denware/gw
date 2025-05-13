
	<!--form-->
	<div class="w-full grow flex flex-col justify-center items-center">
		<div class="w-full text-right dark:text-white">Helló Admin felhasználó!</div>
		<!--form-->
		<div class="w-full grow flex justify-center items-center">
			<div class="w-240 justify-center mt-8 mb-16 p-8 flex flex-col gap-4 shadow-2xl rounded-md border-1 border-solid border-[#ddd]  dark:bg-[#111] dark:border-[#222] dark:text-white">
				<h1 class="w-full mb-8  text-3xl font-[Calibri] font-black text-black dark:text-white">Esemény szerkesztése</h1>
				<form wire:submit="update">
					@csrf
					<div class="grid grid-cols-4 gap-8 mb-8 ">
						<div class="font-black flex flex-row "><label class="self-center">Előadó:</label></div>   			
						<div class="col-span-3">
							<div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="artist" id="artist" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Előadó" value="{{ $event->artist }}" wire:model="form.artist">
								<div class="text-red">@error('artist') {{ $message }} @enderror</div>
							</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Típus:</label></div>   				
						<div class="col-span-3">
							<div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="type" id="type" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Típus" value="{{ $event->type }}" wire:model="form.type">
								<div class="text-red">@error('type') {{ $message }} @enderror</div>
							</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Helyszín:</label></div>   			
						<div class="col-span-3"> 
							<div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="location" id="location" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Helyszín" value="{{ $event->location }}" wire:model="form.location">
								<div class="text-red">@error('location') {{ $message }} @enderror</div>
							</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-topr">Leírás:</label></div>   			
						<div class="col-span-3">
							<textarea name="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"  wire:model="form.description">{{ $event->description }}</textarea>
							<div class="text-red">@error('description') {{ $message }} @enderror</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Kezdete:</label></div>   			<div class="col-span-3">
								<div class=" max-w-50 flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="start" id="start" class="flatpickr-start flatpickr block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Kezdete" value="{{ $event->start }}" wire:model="form.start">
							</div>					
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Vége:</label></div>   				
						<div class="col-span-3">
							<div class="max-w-50 flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="end" id="end" class="flatpickr-end flatpickr block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Vége" value="{{ $event->end }}" wire:model="form.end">
							</div>						
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Jegyek:</label></div>   	
						<div class="col-span-3">
							<div class="max-w-20 flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="number" name="seats" id="seats" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Jegyek" value="{{ $event->seats }}" wire:model="form.seats">
								<div class="text-red">@error('seats') {{ $message }} @enderror</div>
							</div>						
						</div>
					</div>
					<div class="flex flex-row justify-between gap-4">
					<button type="submit" class="rounded-md px-8 py-3 text-sm font-semibold dark:text-[#EDEDEC] border-[#19140035] hovhover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] cursor-pointer" wire:click="trash">Törlés</button>					
					<button type="submit" class="rounded-md px-8 py-3 text-sm font-semibold text-white shadow-xs text-white! bg-[#00A0E3]! hover:bg-[#0080B3]! focus-visible:outline-2 focus-visible:outline-offset-2 cursor-pointer">Mentés</button>
					</div> 
				</form>
			</div>			
		</div>			
	</div>			
		@script
		<script>
		let startValue;
		let startTime;
		const end = flatpickr(".flatpickr-end", {
			enableTime: true,
			dateFormat: "Y.m.d. H:i",
			time_24hr: true,
			"locale": "hu" ,
			monthSelectorType: "static",
			//minDate: new Date().setDate(new Date().getDate() + 5)
			enable: [],
			minTime: "16:00",
			maxTime: "23:30",				
			
		});		
		const start = flatpickr(".flatpickr-start", {
			enableTime: true,
			dateFormat: "Y.m.d. H:i",
			time_24hr: true,
			"locale": "hu" ,
			minTime: "16:00",
			maxTime: "22:30",			
			monthSelectorType: "static",
			onChange: function(selectedDates, dateStr, instance) {
					end.clear();
					startValue = selectedDates[0].toISOString().split('T')[0];
					startTime = new Date(selectedDates[0]);
					
					startTime = startTime.setHours( startTime.getHours()+1 );
					startTime = new Date(startTime);
					startTime = ("0" + startTime.getHours()).slice(-2)   + ":" + 
								"00";
					end.config.enable = [startValue];
					end.config.minTime = startTime;
					end.redraw();
					console.log(startTime);
				},			
			
		});
		

		
		</script>
		@endscript
