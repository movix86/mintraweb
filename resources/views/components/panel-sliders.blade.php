<div class="container mt-3">
    <h2>Custom File</h2>
    <p>To create a custom file upload, wrap a container element with a class of .custom-file around the input with type="file". Then add the .custom-file-input to the file input:</p>
    <form action="/action_page.php">
      <p>Custom file:</p>
      <div class="custom-file mb-3">
        <input type="file" class="custom-file-input" id="customFile" name="filename">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>

      <p>Default file:</p>
      <input type="file" id="myFile" name="filename2">

      <div class="mt-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
</div>
