$(document).ready(function () {
  $(".category-items").hide();

  $(".category-name").click(function () {
    $(this).next(".category-items").slideToggle();
  });

  $(".userform").hide();
  $("#submitBtn").click(function () {
    $(".userform").show();
  });

  const submitBtn = document.getElementById("submitBtn");
  submitBtn.addEventListener("click", () => {
    const checkboxes = document.querySelectorAll(
      'input[type="checkbox"]:checked'
    );
    let totalAmount = 0;
    checkboxes.forEach((checkbox) => {
      const price = parseInt(
        checkbox.nextElementSibling.textContent.match(/\$(\d+)/)[1]
      );
      const quantity = parseInt(
        checkbox.nextElementSibling.nextElementSibling.value
      );
      totalAmount += price * quantity;
    });
    document.getElementById("total_payable").value = `$${totalAmount}`;
  });
});
