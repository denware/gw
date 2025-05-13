		<!--form-->
			<div class="w-full justify-center mt-8 mb-16 p-8 flex flex-row justify-center items-center gap-4 shadow-2xl rounded-md border-1 border-solid border-[#ddd]  dark:bg-[#111] dark:border-[#222] dark:text-white">
				<h1 class="w-full text-3xl font-[Calibri] font-black text-black dark:text-white">Új foglalás</h1>
					<form> </form> 
					<div class="flex flex-row justify-end gap-4 items-center">
						<label class="font-black self-center">Helyek:</label>  	
						<div class="col-span-3">
							<div class="flex items-center rounded-md max-w-40 bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
								<input wire:model="seats" type="number" name="seats" id="seats" class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" value="1" min="1" max="{{ json_decode($event)->free}}">
							</div>						
						</div>					
					<button  wire:click="save" class="rounded-md bg-indigo-600 px-8 py-3 text-sm font-semibold text-white shadow-xs text-white! bg-[#00A0E3]! hover:bg-[#0080B3]! focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 cursor-pointer" type="submit" >Foglalás</button>
					</div>
					
			</div>
		

