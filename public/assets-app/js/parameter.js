function handleSubmit () {
    const search = document.getElementById('myInput').value;

    // to set into local storage
    /* localStorage.setItem("NAME", name);
    localStorage.setItem("SURNAME", surname); */
  alert(search);
    
    sessionStorage.setItem("search", search);

    return;
}