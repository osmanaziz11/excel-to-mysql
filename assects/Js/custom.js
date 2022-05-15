const upload_file = async (event) => {
  $("#loader").toggleClass("d-none");
  const formData = new FormData(event);
  try {
    const request = await fetch("data.php", {
      method: "POST",
      body: formData,
    });
    const res = await request.text();
    if (res != 0) {
      $("#loader").toggleClass("d-none");
      $("#msg").css("color", "green");
      $("#msg").html("Your File has been Uploaded.");
    } else if (res == 0) {
      $("#loader").toggleClass("d-none");
      $("#msg").css("color", "red");
      $("#msg").html("choose valid extension. (.xls,.xlsx).");
    }
  } catch (error) {
    console.log(error);
  }
};
const displayData = async () => {
  try {
    var formData = new FormData();
    formData.append("status", "true");
    const request = await fetch("data.php", {
      method: "POST",
      body: formData,
    });
    const res = await request.json();
    console.log(res);
  } catch (error) {
    console.log(error);
  }
};
