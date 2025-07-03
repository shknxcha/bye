<div class="row mb-3">
    <div class="col-md-6">
        <label>Nama Tanaman</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $jenisTanaman->nama ?? '') }}"
            required>
    </div>
    <div class="col-md-3">
        <label>Suhu Tanah Min</label>
        <input type="number" name="suhu_tanah_min" class="form-control"
            value="{{ old('suhu_tanah_min', $jenisTanaman->suhu_tanah_min ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Suhu Tanah Max</label>
        <input type="number" name="suhu_tanah_max" class="form-control"
            value="{{ old('suhu_tanah_max', $jenisTanaman->suhu_tanah_max ?? '') }}" required>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        <label>Kelembapan Tanah Min</label>
        <input type="number" name="kelembapan_tanah_min" class="form-control"
            value="{{ old('kelembapan_tanah_min', $jenisTanaman->kelembapan_tanah_min ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Kelembapan Tanah Max</label>
        <input type="number" name="kelembapan_tanah_max" class="form-control"
            value="{{ old('kelembapan_tanah_max', $jenisTanaman->kelembapan_tanah_max ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Suhu Udara Min</label>
        <input type="number" name="suhu_udara_min" class="form-control"
            value="{{ old('suhu_udara_min', $jenisTanaman->suhu_udara_min ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Suhu Udara Max</label>
        <input type="number" name="suhu_udara_max" class="form-control"
            value="{{ old('suhu_udara_max', $jenisTanaman->suhu_udara_max ?? '') }}" required>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        <label>Kelembapan Udara Min</label>
        <input type="number" name="kelembapan_udara_min" class="form-control"
            value="{{ old('kelembapan_udara_min', $jenisTanaman->kelembapan_udara_min ?? '') }}" required>
    </div>
    <div class="col-md-3">
        <label>Kelembapan Udara Max</label>
        <input type="number" name="kelembapan_udara_max" class="form-control"
            value="{{ old('kelembapan_udara_max', $jenisTanaman->kelembapan_udara_max ?? '') }}" required>
    </div>
</div>