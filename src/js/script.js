function deleteFile(filename) {
    if (confirm('Are you sure?')) {
      window.location.replace('delete.php?name=' + filename);
    }
  }