document.addEventListener('DOMContentLoaded', function () {
    const btnAddMore = document.getElementById('btn-add-more');
    if (!btnAddMore) return;

    let entryIndex = 1;

    btnAddMore.addEventListener('click', function () {
        const container = document.getElementById('more-entries');
        const itemsOptions = document.querySelector('#item_id_0').innerHTML;

        const entry = document.createElement('div');
        entry.id = `lending-entry-${entryIndex}`;
        entry.className = 'lending-entry border rounded-3 p-3 mb-3 position-relative';
        entry.style.borderColor = '#dee2e6';
        entry.innerHTML = `
            <a href="javascript:void(0)" class="btn-remove-entry text-danger fw-bold position-absolute" style="top: 10px; right: 14px; font-size: 18px;">✕</a>

            <label class="form-label fw-semibold">Name</label>
            <input type="text" name="entries[${entryIndex}][borrower_name]" class="form-control mb-3" placeholder="Borrower Name">

            <label class="form-label fw-semibold">Items</label>
            <select name="entries[${entryIndex}][item_id]" class="form-select mb-3">
                ${itemsOptions}
            </select>

            <label class="form-label fw-semibold">Total</label>
            <input type="number" name="entries[${entryIndex}][total]" class="form-control mb-3" placeholder="Total Item">
        `;

        // Attach remove handler
        entry.querySelector('.btn-remove-entry').addEventListener('click', function () {
            entry.remove();
        });

        container.appendChild(entry);
        entryIndex++;
    });
});