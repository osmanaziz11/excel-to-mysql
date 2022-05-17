const upload_file = async (event) => {
  $("#loader").toggleClass("d-none");
  const formData = new FormData(event);
  try {
    const request = await fetch("server/data.php", {
      method: "POST",
      body: formData,
    });
    const res = await request.text();
    if (res != 0) {
      $("#disp_data_btn").removeAttr("disabled");
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
const menuOpen = () => {
  $("#menuOpen").toggleClass("h-0");
};
const displayData = async () => {
  try {
    var formData = new FormData();
    formData.append("status", "true");
    const request = await fetch("server/data.php", {
      method: "POST",
      body: formData,
    });
    const res = await request.json();
    var row = "";
    var result = res.map((person) => {
      row = `<tr><th class="text-center" scope="row">${person.sno}</th>
                            <td class="px-3 text-center">${person.name}</td>
                            <td class="px-3 text-center">${person.phone}</td>
                            <td class="px-3 text-center">${person.email}</td>
                            <td class="px-3 text-center">${person.provider}</td>
                            <td class="px-3 text-center">${person.reseller}</td>
                            <td class="px-3 text-center">${person.activated_on}</td>
                            <td class="px-3 text-center">${person.renewed_on}</td>
                            <td class="px-3 text-center">${person.system_exp}</td>
                            <td class="px-3 text-center">${person.mac_address}</td>
                            <td class="px-3 text-center">${person.user}</td>
                            <td class="px-3 text-center">${person.status}</td>
                            <td class="px-3 text-center">${person.bf_months}</td>
                            <td class="px-3 text-center">${person.bal_months}</td>
                            <td class="px-3 text-center">${person.bf_dollar}</td>
                            <td class="px-3 text-center">${person.payment_status}</td>
                            <td class="px-3 text-center">${person.comments}</td>;
                            <td class="px-3 text-center">${person.paid_till}</td>;
                            <td class="px-3 text-center">${person.box_price}</td>;
                            <td class="px-3 text-center">${person.actual_renew}</td>;
                            <td class="px-3 text-center">${person.months_bought}</td></tr> ${row}`;
    });
    $("#data_row").html(row);
  } catch (error) {
    console.log(error);
  }
};
