function showTab(tabNumber) {
    // Hide all tab contents and deactivate all tabs
    const tabContents = document.querySelectorAll(".tab-content");
    const tabs = document.querySelectorAll(".tab");
    tabContents.forEach(content => content.classList.remove("active"));
    tabs.forEach(tab => tab.classList.remove("active"));

    // Show the selected tab content and activate the selected tab
    const selectedTabContent = document.getElementById(`tab-${tabNumber}-content`);
    const selectedTab = document.querySelector(`[onclick="showTab(${tabNumber})"]`);
    selectedTabContent.classList.add("active");
    selectedTab.classList.add("active");

    // Move the arrow below the active tab
    const arrow = document.querySelector(".arrow");
    arrow.style.left = `${selectedTab.offsetLeft + (selectedTab.offsetWidth / 2) - 6}px`;
}

// Move the arrow to the first active tab on page load
window.onload = function() {
    const activeTab = document.querySelector(".tab.active");
    const arrow = document.querySelector(".arrow");
    arrow.style.left = `${activeTab.offsetLeft + (activeTab.offsetWidth / 2) - 6}px`;
};