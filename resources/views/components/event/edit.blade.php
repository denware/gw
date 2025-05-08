<div class="mt-8 mb-16 p-8 flex flex-col gap-4 shadow-2xl rounded-md border-1 border-solid border-[#ddd]  dark:bg-[#111] dark:border-[#222] dark:text-white">

	<h1 class="w-full lg:max-w-4xl max-w-[335px] text-3xl font-[Calibri] font-black text-black dark:text-white">#{{ $event->id }} Esemény adatai</h1>

	<div class="grid grid-cols-4 gap-4">
		<div class="font-black">ID:</div>   				<div class="col-span-3">{{ $event->id }}</div>
		<div class="font-black">Előadó:</div>   			<div class="col-span-3">{{ $event->artist }}</div>
		<div class="font-black">Típus:</div>   				<div class="col-span-3">{{ $event->type }}</div>
		<div class="font-black">Helyszín:</div>   			<div class="col-span-3">{{ $event->location }}</div>
		<div class="font-black">Leírás:</div>   			<div class="col-span-3">{{ $event->description }}</div>
		<div class="font-black">Dátum:</div>   				<div class="col-span-3">{{ DateTime::createFromFormat('Y-m-d H:i:s',$event->start)->format('Y. m. d.') }}</div>
		<div class="font-black">Kezdete:</div>   			<div class="col-span-3">{{ DateTime::createFromFormat('Y-m-d H:i:s',$event->start)->format('H:i') }}</div>
		<div class="font-black">Vége:</div>   				<div class="col-span-3">{{ DateTime::createFromFormat('Y-m-d H:i:s',$event->end)->format('H:i') }}</div>
		<div class="font-black">Jegyek összesen:</div>   	<div class="col-span-3">{{ $event->seats }}</div>
		<div class="font-black">Eladott:</div>   			<div class="col-span-3">{{ $event->seats - $event->free }}</div>
		<div class="font-black">Szabad:</div>   			<div class="col-span-3">{{ $event->free }}</div>
		
	</div>
</div>
