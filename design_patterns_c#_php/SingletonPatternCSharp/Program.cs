using System;
using SingletonPatternCSharp.UploadService;

Thread t1 = new Thread(() => {
    var instance = UploadService.Instance(1);
});

Thread t2 = new Thread(() => {
    var instance = UploadService.Instance(2);
});

t1.Start();
t2.Start();

t1.Join();
t2.Join();
