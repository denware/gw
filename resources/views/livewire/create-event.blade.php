

		<!--form-->
		<div class="w-full grow flex justify-center items-center">

			<div class="w-240 justify-center mt-8 mb-16 p-8 flex flex-col gap-4 shadow-2xl rounded-md border-1 border-solid border-[#ddd]  dark:bg-[#111] dark:border-[#222] dark:text-white">
				<h1 class="w-full mb-8  text-3xl font-[Calibri] font-black text-black dark:text-white">Esemény létrehozása</h1>
				<form wire:submit="save">
					
					<div class="grid grid-cols-4 gap-8 mb-8 ">
						<div class="font-black flex flex-row "><label class="self-center">Előadó:</label></div>   			
						<div class="col-span-3">
							<div class="flex max-w-60 items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="artist" id="artist" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Előadó" wire:model="artist">
								<div class="text-red">@error('artist') {{ $message }} @enderror</div>
							</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Típus:</label></div>   				
						<div class="col-span-3">
							<div class="flex max-w-60 items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="name" id="name" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Típus" wire:model="type">
								<div class="text-red">@error('type') {{ $message }} @enderror</div>
							</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Helyszín:</label></div>   			
						<div class="col-span-3"> 
							<div class="flex max-w-60 items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="location" id="location" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Helyszín" wire:model="location">
								<div class="text-red">@error('location') {{ $message }} @enderror</div>
							</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-topr">Leírás:</label></div>   			
						<div class="col-span-3">
							<textarea name="description" id="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" wire:model="description"></textarea>
							<div class="text-red">@error('description') {{ $message }} @enderror</div>
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Kezdete:</label></div>   			<div class="col-span-3">
								<div class="flex max-w-40 items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="start" id="start" class="flatpickr-start flatpickr-input active block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="YYYY.mm.dd. H:i:" wire:model="start">
							</div>					
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Vége:</label></div>   				
						<div class="col-span-3">
							<div class="flex max-w-40 items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="text" name="stop" id="stop" class="flatpickr-end flatpickr-input active block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="YYYY.mm.dd. H:i:" wire:model="end">
							</div>						
						</div>
						<div class="font-black flex flex-row"><label class="self-center">Jegyek:</label></div>   	
						<div class="col-span-3">
							<div class="flex items-center rounded-md max-w-40 bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input type="number" name="seats" id="seats" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="40" min="40" max="200" wire:model="seats">
								<div class="text-red">@error('seats') {{ $message }} @enderror</div>
							</div>						
						</div>
					</div>
					<div class="flex flex-row justify-end">
					<button  class="rounded-md bg-indigo-600 px-8 py-3 text-sm font-semibold text-white shadow-xs text-white! bg-[#00A0E3]! hover:bg-[#0080B3]! focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer" type="submit">Létrehozás</button>
					</div> 
				</form>
			</div>	
			<x-toaster-hub/>
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
								("0" + startTime.getMinutes()).slice(-2);
					end.config.enable = [startValue];
					end.config.minTime = startTime;
					end.redraw();
					console.log(startTime);
				},			
			
		});
		

		
		</script>
		@endscript	
