<?php
$pageTitle = "Admin Login";
include_once "../includes/header.php";

?>

<section class="rounded-md bg-black/70 p-2">
    <div class="flex items-center justify-center bg-white px-4 py-10 sm:px-6 sm:py-16 lg:px-8">
        <div class="xl:mx-auto xl:w-full xl:max-w-sm 2xl:max-w-md">
            <div class="mb-2">
                <svg width="50" height="56" viewBox="0 0 50 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.2732 0.2528C20.8078 1.18964 2.12023 12.2346 1.08477 13.3686C0 14.552 0 14.7493 0 27.7665C0 39.6496 0.0986153 41.1289 0.83823 42.0164C2.12023 43.5449 23.2239 55.4774 24.6538 55.5267C25.9358 55.576 46.1027 44.3832 48.2229 42.4602C49.3077 41.474 49.3077 41.3261 49.3077 27.8158C49.3077 14.3055 49.3077 14.1576 48.2229 13.1714C46.6451 11.7415 27.1192 0.450027 25.64 0.104874C24.9497 -0.0923538 23.9142 0.00625992 23.2732 0.2528ZM20.2161 21.8989C20.2161 22.4906 18.9835 23.8219 17.0111 25.3997C15.2361 26.7803 13.8061 27.9637 13.8061 28.0623C13.8061 28.1116 15.2361 29.0978 16.9618 30.2319C18.6876 31.3659 20.2655 32.6479 20.4134 33.0917C20.8078 34.0286 19.871 35.2119 18.8355 35.2119C17.8001 35.2119 9.0233 29.3936 8.67815 28.5061C8.333 27.6186 9.36846 26.5338 14.3485 22.885C17.6521 20.4196 18.4904 20.0252 19.2793 20.4196C19.7724 20.7155 20.2161 21.3565 20.2161 21.8989ZM25.6893 27.6679C23.4211 34.9161 23.0267 35.7543 22.1391 34.8668C21.7447 34.4723 22.1391 32.6479 23.6677 27.9637C26.2317 20.321 26.5275 19.6307 27.2671 20.3703C27.6123 20.7155 27.1685 22.7864 25.6893 27.6679ZM36.0932 23.2302C40.6788 26.2379 41.3198 27.0269 40.3337 28.1609C39.1503 29.5909 31.6555 35.2119 30.9159 35.2119C29.9298 35.2119 28.9436 33.8806 29.2394 33.0424C29.3874 32.6479 30.9652 31.218 32.7403 29.8867L35.9946 27.4706L32.5431 25.1532C30.6201 23.9205 29.0915 22.7371 29.0915 22.5892C29.0915 21.7509 30.2256 20.4196 30.9159 20.4196C31.3597 20.4196 33.6771 21.7016 36.0932 23.2302Z"
                        fill="black"></path>
                </svg>
            </div>
            <h2 class="text-2xl font-bold leading-tight text-black">
                Welcome Admin
            </h2>
            <p class="mt-2text-sm text-gray-600 ">
                Are you an Employee?
                <a href="./employee_login.php" title=""
                    class="font-semibold text-black transition-all duration-200 hover:underline">
                    Log in here
                </a>
            </p>
            <form action="#" method="POST" class="mt-8">
                <div class="space-y-5">
                    <div>
                        <label for="" class="text-base font-medium text-gray-900">

                            Email address
                        </label>
                        <div class="mt-2">
                            <input
                                class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                type="email" placeholder="Email" />
                        </div>
                    </div>
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="" class="text-base font-medium text-gray-900">

                                Password
                            </label>
                            <a href="#" title="" class="text-sm font-semibold text-black hover:underline">

                                Forgot password?
                            </a>
                        </div>
                        <div class="mt-2">
                            <input
                                class="flex h-10 w-full rounded-md border border-gray-300 bg-transparent px-3 py-2 text-sm placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:ring-offset-1 disabled:cursor-not-allowed disabled:opacity-50"
                                type="password" placeholder="Password" />
                        </div>
                    </div>
                    <div>
                        <button type="button"
                            class="inline-flex w-full items-center justify-center rounded-md bg-black px-3.5 py-2.5 font-semibold leading-7 text-white hover:bg-black/80">
                            Sign In
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="ml-2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                        <p class="mt-2text-sm text-gray-600 ">
                            New to our organization?
                            <a href="./admin_signup.php" title=""
                                class="my-3 font-semibold text-black transition-all duration-200 hover:underline">
                                Sign up here
                            </a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
</section>
<?php
include_once "../includes/footer.php";
?>