function calculateInvestment() {
    const initialInvestment =
        parseFloat(document.getElementById("initialInvestment").value) || 0;
    const annualInterestRate =
        parseFloat(document.getElementById("interestRate").value) || 0;
    const period = parseInt(document.getElementById("period").value) || 0;
    const monthlyDeposit =
        parseFloat(document.getElementById("monthlyDeposit").value) || 0;

    const monthlyInterestRate = annualInterestRate / 100 / 12;
    const totalMonths = period * 12;

    let futureValue =
        initialInvestment * Math.pow(1 + monthlyInterestRate, totalMonths);

    for (let i = 1; i <= totalMonths; i++) {
        futureValue +=
            monthlyDeposit * Math.pow(1 + monthlyInterestRate, totalMonths - i);
    }

    const formatted = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        maximumFractionDigits: 0,
    }).format(futureValue);

    document.getElementById("finalAmount").innerText = formatted;
    document.getElementById("investmentResult").classList.remove("hidden");
}
