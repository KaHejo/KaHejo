@extends('layouts.app')

@section('title', 'Carbon Calculator')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Carbon Calculator Form -->
    <div class="form-card bg-white/90 dark:bg-dark-bg-secondary backdrop-blur-md shadow-xl rounded-xl border-l-4 border-green-500 dark:border-dark-border transform transition-all duration-300 hover:shadow-2xl" data-aos="fade-up" data-aos-duration="1000">
        <!-- Header Section -->
        <div class="px-6 py-6 sm:px-8 border-b border-gray-100 dark:border-dark-border">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                        <i class="fas fa-leaf text-2xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-dark-text-primary">
                            Carbon Footprint Calculator
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">
                            Calculate your environmental impact and take steps towards sustainability
                        </p>
                    </div>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-400 animate-pulse">
                        <i class="fas fa-info-circle mr-2"></i>
                        Required fields
                    </span>
                </div>
            </div>
        </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <!-- Carbon Calculator Form -->
        <div class="bg-white shadow rounded-lg border border-kahejo-light/20">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-kahejo-darkest">Carbon Footprint Calculator</h3>
                <p class="mt-1 text-sm text-kahejo-medium">Calculate your carbon footprint based on your daily activities.</p>
            </div>
            <div class="border-t border-kahejo-light/20">
                <form id="carbonForm" action="{{ url('/carbon/calculate') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    <!-- Month Selection -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="month" class="block text-sm font-medium text-kahejo-darkest">Month</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-kahejo-dark"></i>
                                </div>
                                <input type="month" name="month" id="month" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" required>
                            </div>
                        </div>
                    </div>

                    <!-- Electricity Usage -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="electricity" class="block text-sm font-medium text-kahejo-darkest">Monthly Electricity Usage (kWh)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-bolt text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="electricity" id="electricity" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>

                        <!-- Transportation -->
                        <div>
                            <label for="transportation" class="block text-sm font-medium text-kahejo-darkest">Daily Transportation (km)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-car text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="transportation" id="transportation" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>

                        <!-- Waste -->
                        <div>
                            <label for="waste" class="block text-sm font-medium text-kahejo-darkest">Monthly Waste (kg)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-trash text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="waste" id="waste" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>

                        <!-- Water Usage -->
                        <div>
                            <label for="water" class="block text-sm font-medium text-kahejo-darkest">Monthly Water Usage (m³)</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-water text-kahejo-dark"></i>
                                </div>
                                <input type="number" name="water" id="water" class="focus:ring-kahejo-medium focus:border-kahejo-medium block w-full pl-10 sm:text-sm border-kahejo-light/20 rounded-md" placeholder="0">
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500 dark:text-dark-text-secondary hidden" id="electricityHelp">
                            Enter your monthly electricity consumption in kilowatt-hours (kWh)
                        </p>
                    </div>

                <!-- Action Buttons -->
                <div class="mt-8 flex justify-end space-x-4" data-aos="fade-up" data-aos-delay="500">
                    <button type="submit" id="calculateButton" class="inline-flex items-center px-8 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transform hover:-translate-y-1">
                        <i class="fas fa-calculator mr-2"></i>
                        Calculate Footprint
                    </button>
                    <a href="{{ route('carbon.history') }}" class="inline-flex items-center px-6 py-3 border-2 border-green-500 text-green-600 dark:text-green-400 rounded-lg text-sm font-medium hover:bg-green-50 dark:hover:bg-green-900/30 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transform hover:-translate-y-1">
                        <i class="fas fa-history mr-2"></i>
                        View History
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Results Section (if available) -->
    @if(isset($results))
    <div class="mt-8 bg-white/90 dark:bg-dark-bg-secondary backdrop-blur-md shadow-xl rounded-xl border-l-4 border-green-500 dark:border-dark-border transform transition-all duration-300 hover:shadow-2xl" data-aos="fade-up" data-aos-duration="1000">
        <!-- Header Section -->
        <div class="px-6 py-6 sm:px-8 border-b border-gray-100 dark:border-dark-border">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                        <i class="fas fa-chart-pie text-2xl text-green-600 dark:text-green-400"></i>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-dark-text-primary">
                            Your Carbon Footprint Results
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">
                            Based on your provided information
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-6 py-6 sm:p-8">
            <!-- Total Impact Card -->
            <div class="mb-8 transform transition-all duration-300 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h4 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary">Total Carbon Footprint</h4>
                            <p class="text-3xl font-bold text-green-600 dark:text-green-400 mt-2">{{ number_format($results['total'], 2) }} kg CO₂</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Monthly Impact</p>
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Last updated: {{ now()->format('d M Y') }}</p>
                        </div>
                    </div>
                    <!-- Progress Bar -->
                    <div class="mt-4">
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30">
                                        Progress
                                    </span>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs font-semibold inline-block text-green-600 dark:text-green-400">
                                        {{ number_format(($results['total'] / 1000) * 100, 1) }}%
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-100 dark:bg-green-900/30">
                                <div style="width:{{ min(($results['total'] / 1000) * 100, 100) }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gradient-to-r from-green-500 to-green-600"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Impact Cards -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Electricity Impact -->
                <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                    <i class="fas fa-bolt text-xl text-green-600 dark:text-green-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary">Electricity Impact</dt>
                                <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($results['electricity'], 2) }} kg CO₂</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transportation Impact -->
                <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                    <i class="fas fa-car text-xl text-green-600 dark:text-green-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary">Transportation Impact</dt>
                                <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($results['transportation'], 2) }} kg CO₂</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Waste Impact -->
                <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="400">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                    <i class="fas fa-trash text-xl text-green-600 dark:text-green-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary">Waste Impact</dt>
                                <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($results['waste'], 2) }} kg CO₂</dd>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Water Impact -->
                <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]" data-aos="fade-up" data-aos-delay="500">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                    <i class="fas fa-water text-xl text-green-600 dark:text-green-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <dt class="text-sm font-medium text-gray-500 dark:text-dark-text-secondary">Water Impact</dt>
                                <dd class="mt-1 text-2xl font-semibold text-gray-900 dark:text-dark-text-primary">{{ number_format($results['water'], 2) }} kg CO₂</dd>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recommendations Section -->
            <div class="mt-8" data-aos="fade-up" data-aos-delay="600">
                <h4 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary mb-4">Recommendations to Reduce Your Carbon Footprint</h4>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                    <!-- Energy Efficiency -->
                    <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                        <i class="fas fa-lightbulb text-xl text-green-600 dark:text-green-400"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-dark-text-primary">Energy Efficiency</h5>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Switch to LED bulbs and unplug devices when not in use.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sustainable Transport -->
                    <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                        <i class="fas fa-bicycle text-xl text-green-600 dark:text-green-400"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-dark-text-primary">Sustainable Transport</h5>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Consider walking, cycling, or using public transport.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Waste Reduction -->
                    <div class="bg-white dark:bg-dark-bg-primary overflow-hidden shadow rounded-lg border border-gray-100 dark:border-dark-border transform transition-all duration-300 hover:scale-[1.02]">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="p-2 rounded-lg bg-green-100 dark:bg-green-900/30">
                                        <i class="fas fa-recycle text-xl text-green-600 dark:text-green-400"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-sm font-medium text-gray-900 dark:text-dark-text-primary">Waste Reduction</h5>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-dark-text-secondary">Practice recycling and composting to reduce waste.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Comparison Section -->
            <div class="mt-8" data-aos="fade-up" data-aos-delay="700">
                <h4 class="text-lg font-medium text-gray-900 dark:text-dark-text-primary mb-4">How You Compare</h4>
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-xl p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Your Monthly Impact</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">{{ number_format($results['total'], 2) }} kg CO₂</p>
                        </div>
                        <div class="text-right">
                            <p class="text-sm text-gray-500 dark:text-dark-text-secondary">Average Monthly Impact</p>
                            <p class="text-2xl font-bold text-green-600 dark:text-green-400">1,000 kg CO₂</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="relative pt-1">
                            <div class="flex mb-2 items-center justify-between">
                                <div>
                                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 dark:text-green-400 bg-green-100 dark:bg-green-900/30">
                                        Comparison
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-100 dark:bg-green-900/30">
                                <div style="width:{{ min(($results['total'] / 1000) * 100, 100) }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-gradient-to-r from-green-500 to-green-600"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!-- Tooltip Template -->
<template id="tooltipTemplate">
    <div class="tooltip absolute z-50 px-3 py-2 text-sm text-white bg-gray-900 dark:bg-gray-700 rounded-lg shadow-lg opacity-0 transition-opacity duration-200 pointer-events-none">
        <div class="tooltip-content"></div>
        <div class="tooltip-arrow absolute w-2 h-2 bg-gray-900 dark:bg-gray-700 transform rotate-45"></div>
    </div>
</template>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Tooltip System
        const tooltips = document.querySelectorAll('[data-tooltip]');
        const tooltipTemplate = document.getElementById('tooltipTemplate');
        let activeTooltip = null;

        tooltips.forEach(element => {
            element.addEventListener('mouseenter', function(e) {
                if (activeTooltip) {
                    activeTooltip.remove();
                }

                const tooltip = tooltipTemplate.content.cloneNode(true);
                const tooltipElement = tooltip.querySelector('.tooltip');
                const tooltipContent = tooltip.querySelector('.tooltip-content');
                const tooltipArrow = tooltip.querySelector('.tooltip-arrow');

                tooltipContent.textContent = this.dataset.tooltip;
                document.body.appendChild(tooltipElement);

                const rect = this.getBoundingClientRect();
                const tooltipRect = tooltipElement.getBoundingClientRect();

                tooltipElement.style.top = `${rect.top - tooltipRect.height - 10}px`;
                tooltipElement.style.left = `${rect.left + (rect.width / 2) - (tooltipRect.width / 2)}px`;
                tooltipArrow.style.bottom = '-4px';
                tooltipArrow.style.left = '50%';
                tooltipArrow.style.transform = 'translateX(-50%) rotate(45deg)';

                setTimeout(() => {
                    tooltipElement.style.opacity = '1';
                }, 10);

                activeTooltip = tooltipElement;
            });

            element.addEventListener('mouseleave', function() {
                if (activeTooltip) {
                    activeTooltip.style.opacity = '0';
                    setTimeout(() => {
                        activeTooltip.remove();
                        activeTooltip = null;
                    }, 200);
                }
            });
        });

        // Form Validation and Help Text
        const inputs = document.querySelectorAll('input[type="number"]');
        inputs.forEach(input => {
            const helpText = document.getElementById(`${input.id}Help`);

            input.addEventListener('focus', function() {
                helpText.classList.remove('hidden');
                this.parentElement.classList.add('ring-2', 'ring-green-500', 'ring-opacity-50');
            });

            input.addEventListener('blur', function() {
                helpText.classList.add('hidden');
                this.parentElement.classList.remove('ring-2', 'ring-green-500', 'ring-opacity-50');
            });

            input.addEventListener('input', function() {
                if (this.value < 0) {
                    this.value = 0;
                }
                this.classList.toggle('border-red-500', !this.checkValidity());
            });
        });

        // Form Submission Animation
        const form = document.getElementById('carbonForm');
        const calculateButton = document.getElementById('calculateButton');

        form.addEventListener('submit', function(e) {
            if (!this.checkValidity()) {
                e.preventDefault();
                return;
            }

            calculateButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Calculating...';
            calculateButton.disabled = true;
            calculateButton.classList.add('opacity-75', 'cursor-not-allowed');
        });

        // Add hover effects to cards
        const cards = document.querySelectorAll('.bg-white');
        cards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'scale(1.02)';
                this.style.boxShadow = '0 8px 12px rgba(0, 0, 0, 0.1)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
            });
        });
    });
</script>
@endsection
