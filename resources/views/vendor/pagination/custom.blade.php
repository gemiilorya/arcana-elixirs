<style>
.pagination-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 75px;
    margin-top: 20px;
}

.pagination-btn {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 40px;
    height: 40px;background: #D3C6F5;
    background: linear-gradient(90deg, rgba(211, 198, 245, 1) 0%, rgba(234, 223, 255, 1) 30%, rgba(215, 231, 254, 1) 70%, rgba(193, 216, 255, 1) 100%);
    color: black;
    font-size: 20px;
    font-weight: bold;
    border-radius: 50%;
    text-decoration: none;
}

.pagination-btn.disabled {
    background-color: gray !important;
    cursor: not-allowed;
    pointer-events: none;
}


</style>

@if ($paginator->hasPages())
    <div class="pagination-container">
        {{-- Previous Page Link --}}
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <i class="fas fa-arrow-left"></i>
        </a>

        {{-- Next Page Link --}}
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <i class="fas fa-arrow-right"></i>
        </a>
    </div>
@endif
