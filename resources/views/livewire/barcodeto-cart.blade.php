<div>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Código de Barras</span>
        </div>
        <input class="form-control" type="search" name="search" placeholder="Buscar" aria-label="Search" wire:model.lazy="buscar" wire:keydown.enter="barcodesearch">
        <button class="btn" type="submit" wire:click="barcodesearch">
            <i class="fas fa-search" aria-hidden="true"></i>
        </button>
        <input class="form-control" type="number" name="quantity" id="srchquantity" min="1" value="1" wire:model.lazy="quantity" wire:keydown.enter="barcodesearch">
    </div>
</div>